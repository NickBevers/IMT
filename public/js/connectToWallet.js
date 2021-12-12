// import { ethers } from "ethers.js";
// await ethereum.request({ method: "eth_requestAccounts" });

let userFeedback;


window.addEventListener("load", async()=>{
    // connect to wallet
    // const connectWalletBtn = document.querySelector("#connectToWallet");
    // connectWalletBtn.addEventListener("click", async() => {
    //     const provider = new ethers.providers.Web3Provider(window.ethereum);
    //     const accounts = await ethereum.request({method: "eth_requestAccounts"});
    //     console.log(accounts[0]);
    // })

    // on accounts changed
    window.ethereum.on("accountsChanged", function (accounts) {
        // Time to reload your interface with accounts[0]!
        this.metamaskAccount = accounts[0];
    });


    // contract connection
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    const signer = provider.getSigner();
    const contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
    let Abi;
    await fetch("/abi/contract.json").then((res) => {return res.json();}).then((data) => {Abi = data;});
    const contract = new ethers.Contract(contractAddress, Abi, provider);
    let contractWithSigner = contract.connect(signer);
    
    
    // variables
    let nft = document.querySelector("#nft");
    const priceField = document.querySelector(".price");
    const mintNFTBtn = document.querySelector(".mint_btn");
    const buyNFTBtn = document.querySelector(".buy_btn");
    const sellNFTBtn = document.querySelector(".sell_btn");

    if(nft.dataset.minted == true){
        // console.log("MINTED");
        // console.log(price);
        // console.log(price.toString());
        // console.log("{{$nft->token_id}}");
        // console.log(ethers.utils.toString(price));
        // console.log(forSale);
        // console.log(nft.dataset.tokenId);
        const price = await contractWithSigner.getPrice(ethers.BigNumber.from(nft.dataset.token_id));
        const forSale = await contractWithSigner.isForSale(ethers.BigNumber.from(nft.dataset.token_id));
        priceField.innerHTML =  ethers.utils.formatEther(price);
        
        if (forSale == true){
            document.querySelector(".for_sale").innerHTML = ' ';
            document.querySelector(".sell_btn").style.display = "none";
        }
        if (forSale == false){
            document.querySelector(".for_sale").innerHTML = 'This NFT cannot be bought right now';
        }
        
        buyNFTBtn.addEventListener("click", async()=>{
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

            const price = await contractWithSigner.getPrice(ethers.BigNumber.from(nft.dataset.token_id));

            const buyResponse =  await contractWithSigner.buyNFT(ethers.BigNumber.from(nft.dataset.token_id), {value: price.toString()});
            await buyResponse.wait()
            .then(res => {
                console.log(res);
            });
        });

        
        sellNFTBtn.addEventListener("click", async()=>{
            let price = ethers.utils.parseUnits("{{$nft->price}}", "ether");
            // console.log(price);
            
            const transaction =  await contractWithSigner.putUpForSale(ethers.BigNumber.from(nft.dataset.token_id), price);
            await transaction.wait().then(res => {
                console.log(res);
            });
            console.log("RESPONSE");
        });
    }

    else{
        console.log("NOT MINTED");
        // TODO: add price = 0

        mintNFTBtn.addEventListener("click", async()=>{
            const provider = new ethers.providers.Web3Provider(window.ethereum);
            const signer = await provider.getSigner();
            const contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
            let Abi;
            await fetch("/abi/contract.json").then((res) => {return res.json();}).then((data) => {Abi = data;});
            const contract = await new ethers.Contract(contractAddress, Abi, provider);
            const contractWithSigner = await contract.connect(signer);

            // console.log("MINTED");
            let tokenUri = `https://ipfs.io/ipfs/${nft.dataset.tokenId}`;
            let tempPrice = nft.dataset.price;
            let price = ethers.utils.parseEther(tempPrice);
            
            let tokenId;
            const transaction = await contractWithSigner.mintNFT(tokenUri, price);
            await transaction.wait().then(res => {
                console.log(res);
                let tokenIdString = res['events'][0]['topics'][3]; //returns string with tokenId as hexadecimal
                console.log(tokenIdString);
                tokenId = ethers.BigNumber.from(tokenIdString).toString(); //puts string in a BigNumber, and converts it to a readable tokenId
                console.log(tokenId);
            });
            
            
            const nftId =  nft.dataset.id;
            const nft_owner = transaction['from'];
            const form = document.createElement('form');
            form.method = "POST";
            form.action = `/nft/addItemId/${nftId}/${tokenId}/${nft_owner}`;


            let csrf_token = nft.dataset.csrf;
            const hiddencsrf = document.createElement('input');
            hiddencsrf.type = 'hidden';
            hiddencsrf.name = "_token";
            hiddencsrf.value = csrf_token;

            form.appendChild(hiddencsrf);

            document.body.appendChild(form);
            form.submit();
        });


    }
})