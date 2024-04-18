import * as THREE from "three";

// Create a new scene
const scene = new THREE.Scene();

// Create a perspective camera with specified field of view,
// aspect ratio, near and far clipping plane
const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);

// Create a WebGL renderer and set its size to match the window
// dimensions
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);

// Append the renderer's DOM element to the document body
document.body.appendChild(renderer.domElement);

// Create a box geometry with dimensions 1x1x1
const geometry = new THREE.BoxGeometry(1, 1, 1);

// Create a basic material with green color
const material = new THREE.MeshBasicMaterial({ color: 0x00ff00 });

// Create meshes by combining the geometry and material
const cube1 = new THREE.Mesh(geometry, material);
const cube2 = new THREE.Mesh(geometry, material);

// Set position of the first cube
cube1.position.x = -1.5; // Move to the left
cube1.position.y = 0; // Keep at the center
cube1.position.z = 0; // Keep at the center of the scene's depth

// Set position of the second cube
cube2.position.x = 1.5; // Move to the right
cube2.position.y = 0; // Keep at the center
cube2.position.z = 0; // Keep at the center of the scene's depth

// Add the cube meshes to the scene
scene.add(cube1);
scene.add(cube2);

// Set the initial camera position
camera.position.z = 5;

// Define an animate function to update the scene and render it
function animate() {
  // Request the browser to call animate on the next repaint
  requestAnimationFrame(animate);

  // Rotate the cubes around its x and y axes
  cube1.rotation.x += 0.01;
  cube1.rotation.y += 0.01;
  cube2.rotation.x += 0.01;
  cube2.rotation.y += 0.01;

  // Render the scene with the camera
  renderer.render(scene, camera);
}

// Start the animation loop
animate();
