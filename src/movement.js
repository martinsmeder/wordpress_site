function jump(object, isJumping) {
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
      isJumping.value = false;
    } else {
      // If the player is still in the air, continue the jump animation
      requestAnimationFrame(update);
    }
  }

  // Start the jump animation
  update();

  return isJumping.value;
}

export default jump;
