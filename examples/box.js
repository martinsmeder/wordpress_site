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

// Create a mesh by combining the geometry and material
const cube = new THREE.Mesh(geometry, material);

// Add the cube mesh to the scene
scene.add(cube);

// Set the initial camera position
camera.position.z = 5;

// Define an animate function to update the scene and render it
function animate() {
  // Request the browser to call animate on the next repaint
  requestAnimationFrame(animate);

  // Rotate the cube around its x and y axes
  cube.rotation.x += 0.01;
  cube.rotation.y += 0.01;

  // Render the scene with the camera
  renderer.render(scene, camera);
}

// Start the animation loop
animate();
