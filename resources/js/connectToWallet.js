// import { ethers } from "ethers.js";
// await ethereum.request({ method: "eth_requestAccounts" });

let userFeedback;

window.addEventListener("load", ()=>{
    window.ethereum.on("accountsChanged", function (accounts) {
        // Time to reload your interface with accounts[0]!
        this.metamaskAccount = accounts[0];
    });
  
    if (typeof window.ethereum !== "undefined") {
        //Metamask is installed
        userFeedback = "Metamask is installed.";
    } else {
        //Metamask is not installed
        userFeedback = "Please install MetaMask.";
    }
})


const connectWalletBtn = document.querySelector("#connectToWallet");
connectWalletBtn.addEventListener("click", () => {
    ethereum.request({ method: 'eth_requestAccounts' });

    const provider = new ethers.providers.Web3Provider(window.ethereum);
    const signer = provider.getSigner();
    console.log(signer);
})


const mintNFTBtn = document.querySelector("#mint_btn");
mintNFTBtn.addEventListener("click", async()=>{
    console.log("MINTED");
    const provider = new ethers.providers.Web3Provider(window.ethereum);
    const signer = provider.getSigner();
    const contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
    const Abi = await fetch("./../abi/contract.json") .then((res) => {return res.json();}).then((data) => {this.contract.abi = data.abi; console.log(this.contract.abi);});
    const contract = new ethers.Contract(contractAddress, Abi, provider);
    console.log(contract);

    // Connect the signer, or replace provider with signer when instantiating the contract object
    let contractWithSigner = contract.connect(signer);

    // call the methods
    // address studentAddress, string memory studentName, uint studentScore
    
    // let tx = await contractWithSigner.mintNFT(
    //   this.studentAddress,
    //   this.studentName,
    //   this.studentScore
    // );
    // await tx.wait();
});