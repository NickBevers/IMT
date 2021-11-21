// import { ethers } from "ethers.js";

// await ethereum.request({ method: "eth_requestAccounts" });
const provider = new ethers.providers.Web3Provider(window.ethereum);
const signer = provider.getSigner();
console.log(signer);

