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
camera.position.set(0, 5, 10);

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

// Define movement speed
const movementSpeed = 0.1;

// Define keyboard state
const keyboard = {};

// Define jump state
let isJumping = false;

// Listen for keyboard events
document.addEventListener("keydown", (event) => {
  keyboard[event.key] = true;
  // Check if the spacebar is pressed and the player is not already jumping
  if (event.key === " ") {
    if (!isJumping) {
      isJumping = true;
      jump(player);
    }
  }
});
document.addEventListener("keyup", (event) => {
  keyboard[event.key] = false;
});

// Define an animate function to update the scene and render it
function animate() {
  // Request the browser to call animate on the next repaint
  requestAnimationFrame(animate);

  // Apply gravity to the player and target dummy
  applyGravity(player, platform);
  applyGravity(targetDummy, platform);

  // Move player based on keyboard input
  if (keyboard["w"]) player.position.z -= movementSpeed;
  if (keyboard["s"]) player.position.z += movementSpeed;
  if (keyboard["a"]) player.position.x -= movementSpeed;
  if (keyboard["d"]) player.position.x += movementSpeed;

  // Update camera position relative to the player
  camera.position.copy(player.position).add(cameraOffset);
  camera.lookAt(player.position);

  // Render the scene with the camera
  renderer.render(scene, camera);
}

// Define a jump function
function jump(object) {
  // Set the initial jump velocity
  let jumpVelocity = 0.5;

  // Define an update function to handle the jump animation
  function update() {
    // Apply the jump velocity to the player's Y position
    object.position.y += jumpVelocity;

    // Decrease the jump velocity to simulate gravity
    jumpVelocity -= 0.01;

    // Check if the player has landed on the platform
    if (object.position.y <= 0.5) {
      // Reset the player's Y position and jump flag
      object.position.y = 0.5;
      isJumping = false;
    } else {
      // If the player is still in the air, continue the jump animation
      requestAnimationFrame(update);
    }
  }

  // Start the jump animation
  update();
}

// Start the animation loop
animate();
