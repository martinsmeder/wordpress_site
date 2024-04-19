import * as THREE from "three";

// Create mesh for target dummy
const targetDummyGeometry = new THREE.BoxGeometry(1, 1, 1);
const targetDummyMaterial = new THREE.MeshBasicMaterial({ color: 0x0000ff }); // Blue color for target dummy
const targetDummy = new THREE.Mesh(targetDummyGeometry, targetDummyMaterial);
targetDummy.position.set(2, 5, 0); // Position the target dummy on the platform

export default targetDummy;
