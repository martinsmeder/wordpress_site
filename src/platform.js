import * as THREE from "three";

// Create mesh for platform
const platformGeometry = new THREE.BoxGeometry(10, 1, 10);
const platformMaterial = new THREE.MeshBasicMaterial({ color: 0x808080 });
const platform = new THREE.Mesh(platformGeometry, platformMaterial);
platform.position.set(0, -0.5, 0);

export default platform;
