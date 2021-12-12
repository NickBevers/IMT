@extends('layouts/app')

@section('content')
<!-- Detail -->
    <section class="nft_section" data-id="{{ $nft->id }}">
        <img class="nft_picture" src="https://ipfs.io/ipfs/{{$nft->media_url}}" alt="nft picture">
        <div class="nft_info_container">
            <h2>{{ $nft->title }}</h2>
            <p>
                Created by: {{ $user->first_name . " " .  $user->last_name }}
            </p>
            @if($nft->for_sale == 0)
                <p class="forSale">This NFT cannot be bought right now</p>
            @endif
            <div class="price_wrapper">
                <div class="eth_wrapper">
                    <img src="{{ asset('images/ethIcon.png') }}" alt="Etherium icon">
                    <h3 class="price">{{ $nft->price }}</h3>
                    <script type="text/javascript">
                        window.addEventListener("load", async()=>{
                            const provider = new ethers.providers.Web3Provider(window.ethereum);
                            const signer = provider.getSigner();
                            const contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
                            let Abi;
                            await fetch("/abi/contract.json").then((res) => {return res.json();}).then((data) => {Abi = data;});
                            const contract = new ethers.Contract(contractAddress, Abi, provider);
                            let contractWithSigner = contract.connect(signer);
                            
                            if({{$nft->minted}} == true){
                                console.log("MINTED");
                                const priceField = document.querySelector(".price");
                                const price = await contractWithSigner.getPrice("{{$nft->token_id}}");
                                const isForSale = await contractWithSigner.isForSale("{{$nft->token_id}}");
                                // console.log(ethers.utils.toString(price));
                                console.log(ethers.utils.formatEther(price));
                                console.log(isForSale);
                                if (isForSale === true){
                                    document.querySelector(".forSale").style.visibility = 'hidden';
                                }
                                if (isForSale === false){
                                    document.querySelector(".forSale").style.visibility = 'visible';
                                }
                                priceField.innerHTML =  price;
                            }

                            else{
                                console.log("NOT MINTED");
                            }
                            
                        });
                    </script>
                </div>
                <div class="conversion_wrapper">
                    <h3>€{{ $nft->convertedPrice["EUR"] }}</h3>
                    <h3>${{ $nft->convertedPrice["USD"] }}</h3>
                </div>
            </div>
            

            <div class="buy_add_container">
                <a class="buy_btn">Buy</a>
                @if($nft->minted == false)
                    <a class="buy_btn mint_btn" style="cursor: pointer">Mint</a>
                @endif
                <a class="sell_btn">Sell</a>
                
                <script type="text/javascript"> 
                    if ({{$nft->minted}} == false){
                        const mintNFTBtn = document.querySelector(".mint_btn");
                        mintNFTBtn.addEventListener("click", async()=>{
                            const provider = new ethers.providers.Web3Provider(window.ethereum);
                            const signer = await provider.getSigner();
                            const contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
                            let Abi;
                            await fetch("/abi/contract.json").then((res) => {return res.json();}).then((data) => {Abi = data;});
                            const contract = await new ethers.Contract(contractAddress, Abi, provider);
                            let contractWithSigner = await contract.connect(signer);


                            // console.log("MINTED");
                            let media_file = "https://ipfs.io/ipfs/{{$nft->media_url}}";
                            // let price = ethers.utils.parseEther({{$nft->price}}.toString());
                            let tempPrice = "{{$nft->price}}";
                            console.log(tempPrice);
                            let price = ethers.utils.parseUnits(tempPrice, "ether");
                            console.log(price);
        
                                                
                            const mintResponse =  await contractWithSigner.mintNFT(media_file, price);
                            const itemId = mintResponse['hash'];
                            const nftId =  "{{$nft->id}}";
                            const nft_owner = mintResponse['from'];
        
                            const form = document.createElement('form');
                            let nft_id = nftId;
                            let item_id = itemId;
                            let owner = nft_owner;
                            form.method = "POST";
                            form.action = `/nft/addItemId/${nft_id}/${itemId}/${owner}`;
        
        
                            let csrf_token = "{{csrf_token()}}";
                            const hiddencsrf = document.createElement('input');
                            hiddencsrf.type = 'hidden';
                            hiddencsrf.name = "_token";
                            hiddencsrf.value = csrf_token;
        
                            form.appendChild(hiddencsrf);
        
                            document.body.appendChild(form);
                            form.submit();
                        });
                    }

                    if ({{$nft->minted}} == true){
                        const buyNFTBtn = document.querySelector(".buy_btn");
                        buyNFTBtn.addEventListener("click", async()=>{
                            const provider = new ethers.providers.Web3Provider(window.ethereum);
                            const signer = await provider.getSigner();
                            const contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
                            let Abi;
                            await fetch("/abi/contract.json").then((res) => {return res.json();}).then((data) => {Abi = data;});
                            const contract = await new ethers.Contract(contractAddress, Abi, provider);
                            let contractWithSigner = await contract.connect(signer);
                        
                            const buyResponse =  await contractWithSigner.buyNFT("{{$nft->token_id}}");
                            console.log(buyResponse);
                        });                        
                    }

                    const sellNFTBtn = document.querySelector(".sell_btn");
                    sellNFTBtn.addEventListener("click", async()=>{
                        await ethereum.request({ method: "eth_requestAccounts" });
                        // let provider = ethers.getDefaultProvider("rinkeby", "{{env('ETHERSCAN_API')}}");
                        
                        let provider = new ethers.providers.Web3Provider(window.ethereum);
                        console.log(provider);
                        let signer = await provider.getSigner();
                        console.log(signer);
                        let contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
                        let Abi;
                        await fetch("/abi/contract.json").then((res) => {return res.json();}).then((data) => {Abi = data;});
                        let contract = await new ethers.Contract(contractAddress, Abi, provider);
                        let contractWithSigner = await contract.connect(signer);

                        let price = ethers.utils.parseUnits("{{$nft->price}}", "ether");
                        
                        console.log(price);
                        const buyResponse =  await contractWithSigner.putUpForSale("{{$nft->token_id}}", price);
                        console.log("RESPONSE: " + buyResponse);
                    });

                </script>

            </div>
        </div>
    </section>
    <section class="nft_comments">
        <h3>Comments</h3>
        <form id="comment_form" method="POST" action="{{ url('/nft/detail/addComment') }}">
            @csrf
            <input type="hidden" value="{{$nft->id}}" name="id">
            {{-- <livewire:comment-post /> --}}
            <input id="comment_form_input" type="textarea" name="content">
            <button type="submit">Submit</button>
        </form>
        <ul class="comment_list">
            @foreach($comments as $comment)
                <li class="comment_list_item">
                    <div class="comment_data">
                        <p class="comment_user">{{ $comment->first_name }}</p>
                        <p class="comment_content">{{ $comment->content }}</p>
                    </div>
                    @if($user->id == $comment->user_id)
                        <form method="POST" action="{{ url('/nft/detail/removeComment') }}">
                            @csrf
                            <input type="hidden" value="{{ $comment->id }}" name="id">
                            {{-- <livewire:comment-post /> --}}
                            <button type="submit" class="comment_delete">Remove</button>
                        </form>
                    @endif
                </li>
                <hr class="comment_faint_line">
            @endforeach
        </ul>
    </section>
    
    <script src="{{ asset('js/slide_menu.js') }}"></script>
    {{-- <script src="{{ asset('js/mintNFT.js') }}"></script> --}}
@endsection