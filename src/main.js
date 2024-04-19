import * as THREE from "three";
import platform from "./platform";
import player from "./player";
import targetDummy from "./targetDummy";
import applyGravity from "./utils";

// Create a scene
const scene = new THREE.Scene();

// Create a camera
const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
camera.position.set(0, 5, 10); // Adjust camera position to view the platform

// Create a renderer
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Add objects to the scene
scene.add(platform);
scene.add(player);
scene.add(targetDummy);

// Define the offset for the camera from the player
const cameraOffset = new THREE.Vector3(0, 5, 7);

// Define an animate function to update the scene and render it
function animate() {
  // Request the browser to call animate on the next repaint
  requestAnimationFrame(animate);

  // Apply gravity to the player and target dummy
  applyGravity(player, platform);
  applyGravity(targetDummy, platform);

  // Update camera position relative to the player
  camera.position.copy(player.position).add(cameraOffset);
  camera.lookAt(player.position);

  // Render the scene with the camera
  renderer.render(scene, camera);
}

// Start the animation loop
animate();
