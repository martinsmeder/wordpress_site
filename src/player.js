import * as THREE from "three";

// Create mesh for player
const playerGeometry = new THREE.BoxGeometry(1, 1, 1);
const playerMaterial = new THREE.MeshBasicMaterial({ color: 0xff0000 }); // Red color for player
const player = new THREE.Mesh(playerGeometry, playerMaterial);
player.position.set(-2, 5, 0); // Position the player on the platform

export default player;
