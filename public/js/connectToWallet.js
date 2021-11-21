// import { ethers } from "ethers.js";
// await ethereum.request({ method: "eth_requestAccounts" });

let userFeedback;

window.onload(()=>{
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