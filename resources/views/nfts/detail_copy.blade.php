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
            <p class="for_sale"></p>
            <div class="price_wrapper">
                <div class="eth_wrapper">
                    <img src="{{ asset('images/ethIcon.png') }}" alt="Etherium icon">
                    {{-- <h3>{{ $nft->price }}</h3> --}}
                    <h3 class="price"></h3>
                    <script type="text/javascript">
                        window.addEventListener("load", async()=>{
                            const provider = new ethers.providers.Web3Provider(window.ethereum);
                            const signer = provider.getSigner();
                            const contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
                            let Abi;
                            await fetch("/abi/contract.json").then((res) => {return res.json();}).then((data) => {Abi = data;});
                            const contract = new ethers.Contract(contractAddress, Abi, provider);
                            let contractWithSigner = contract.connect(signer);

                            // console.log(ethers.BigNumber.from("0x00000000000000000000000000000000000000000000000000000000000000c7"));
                            
                            if({{$nft->minted}} == true){
                                console.log("MINTED");
                                const priceField = document.querySelector(".price");
                                const price = await contractWithSigner.getPrice("{{$nft->token_id}}");
                                console.log(price);
                                console.log(price.toString());
                                console.log("{{$nft->token_id}}");
                                const forSale = await contractWithSigner.isForSale("{{$nft->token_id}}");

                                // console.log(ethers.utils.toString(price));
                                // console.log(forSale);
                                
                                if (forSale == true){
                                    document.querySelector(".for_sale").innerHTML = ' ';
                                    document.querySelector(".sell_btn").style.display = "none";
                                }
                                if (forSale == false){
                                    document.querySelector(".for_sale").innerHTML = 'This NFT cannot be bought right now';
                                }
                                priceField.innerHTML =  ethers.utils.formatEther(price);
                            }

                            else{
                                console.log("NOT MINTED");
                                // TODO: add price = 0
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
                            const contractWithSigner = await contract.connect(signer);

                            // console.log("MINTED");
                            let tokenUri = "https://ipfs.io/ipfs/{{$nft->media_url}}";
                            // let price = ethers.utils.parseEther({{$nft->price}}.toString());
                            let tempPrice = "{{$nft->price}}";
                            console.log(tempPrice);
                            let price = ethers.utils.parseEther(tempPrice);
                            //let price = ethers.utils.parseUnits(tempPrice, "ether");
                            console.log(price);
                            
                            let tokenId;
                            const transaction = await contractWithSigner.mintNFT(tokenUri, price);
                            await transaction.wait().then(res => {
                                console.log(res);
                                //console.log(res['events'][0]['topics']);
                                let tokenIdString = res['events'][0]['topics'][3]; //returns string with tokenId as hexadecimal
                                console.log(tokenIdString);
                                tokenId = ethers.BigNumber.from(tokenIdString).toString(); //puts string in a BigNumber, and converts it to a readable tokenId
                                console.log(tokenId);
                            });




                            // const nftId =  "{{$nft->id}}";
                            // const nft_owner = transaction['from'];
                            // const form = document.createElement('form');
                            // form.method = "POST";
                            // form.action = `/nft/addItemId/${nftId}/${tokenId}/${nft_owner}`;
        
        
                            // let csrf_token = "{{csrf_token()}}";
                            // const hiddencsrf = document.createElement('input');
                            // hiddencsrf.type = 'hidden';
                            // hiddencsrf.name = "_token";
                            // hiddencsrf.value = csrf_token;
        
                            // form.appendChild(hiddencsrf);
        
                            // document.body.appendChild(form);
                            // form.submit();
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

                            //let hexId = ethers.BigNumber.from("{{$nft->token_id}}");
                            
                            // let tempId = hexId['_hex'].split('x')[1];
                            //console.log(ethers.BigNumber.from(ethers.utils.hexZeroPad(ethers.BigNumber.from("{{$nft->token_id}}"), 32)));
                            // let tokenId = ethers.utils.hexZeroPad(ethers.BigNumber.from("{{$nft->token_id}}"), 32);
                            // console.log(tokenId);
                            // console.log(ethers.BigNumber.from(tokenId));
                            
                            // console.log(ethers.BigNumber.from("{{$nft->token_id}}"));
                            
                            // console.log(ethers.utils.hexZeroPad());
                            // console.log(hexId);

                            // 0x00000000000000000000000000000000000000000000000000000000000000c7

                            // const tx ={
                            //     from: send_account,
                            //     to: to_address,
                            //     value: ethers.utils.parseEther(send_token_amount),
                            //     nonce: window.ethersProvider.getTransactionCount(send_account, "latest"),
                            //     gasLimit: ethers.utils.hexlify(gas_limit), // 100000
                            //     gasPrice: gas_price,
                            // }

                            const price = await contractWithSigner.getPrice("{{$nft->token_id}}");

                            const buyResponse =  await contractWithSigner.buyNFT("{{$nft->token_id}}", {value: price.toString()});
                            await buyResponse.wait().then('...');
                            console.log(buyResponse);
                        });                        
                    }

                    const sellNFTBtn = document.querySelector(".sell_btn");
                    sellNFTBtn.addEventListener("click", async()=>{
                        await ethereum.request({ method: "eth_requestAccounts" });
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
                        // console.log(price);
                        
                        const transaction =  await contractWithSigner.putUpForSale("{{$nft->token_id}}", price);
                        await transaction.wait().then(res => {
                            console.log(res);
                        });
                        console.log("RESPONSE");
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