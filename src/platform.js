import * as THREE from "three";

// Create a box geometry for the platform
const platformGeometry = new THREE.BoxGeometry(10, 1, 10);

// Create a basic material for the platform
const platformMaterial = new THREE.MeshBasicMaterial({ color: 0x808080 });

// Create a mesh using the geometry and material
const platform = new THREE.Mesh(platformGeometry, platformMaterial);

// Position the platform at the bottom of the scene
platform.position.set(0, -0.5, 0); // Adjust the position as needed

export default platform;
