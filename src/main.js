import * as THREE from "three";
import platform from "./platform";
import player from "./player";
import targetDummy from "./targetDummy";
import applyGravity from "./utils";
import jump from "./movement";

// Create a scene
const scene = new THREE.Scene();

// Create a camera
const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);

// Set the camera position to be slightly above the player's head
camera.position.set(0, 2, 0);

// Create a renderer
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Add objects to the scene
scene.add(platform);
scene.add(player);
scene.add(targetDummy);

// Define movement speed
const movementSpeed = 0.1;

// Define keyboard state
const keyboard = {};

// Define jump state as an object with a value property
let isJumping = { value: false };

// Listen for keyboard events
document.addEventListener("keydown", (event) => {
  keyboard[event.key] = true;
  // Check if the spacebar is pressed and the player is not already jumping
  if (event.key === " ") {
    if (!isJumping.value) {
      isJumping.value = true;
      jump(player, isJumping);
    }
  }
});
document.addEventListener("keyup", (event) => {
  keyboard[event.key] = false;
});

document.body.addEventListener("mousemove", (event) => {
  // Logic to update camera direction
});

// Define an animate function to update the scene and render it
function animate() {
  requestAnimationFrame(animate);

  // Apply gravity to the player and target dummy
  applyGravity(player, platform);
  applyGravity(targetDummy, platform);

  // Move player based on keyboard input
  if (keyboard["w"]) player.position.z -= movementSpeed;
  if (keyboard["s"]) player.position.z += movementSpeed;
  if (keyboard["a"]) player.position.x -= movementSpeed;
  if (keyboard["d"]) player.position.x += movementSpeed;

  // Update camera position to follow the player's position
  camera.position.copy(player.position);

  // Update camera look at player
  camera.lookAt(player.position);

  // Render the scene with the camera
  renderer.render(scene, camera);
}

// Start the animation loop
animate();
