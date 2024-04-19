// Apply gravity to an object
function applyGravity(object, ground) {
  // Set gravity value
  const gravity = 0.1;
  // Update object position based on gravity by subtracting gravity from the
  // object's Y position to simulate downward movement
  object.position.y -= gravity;

  // Check collision with the ground
  if (
    // Check if the bottom of the object (taking into account its height) is lower
    // than or equal to the top of the ground
    object.position.y - object.geometry.parameters.height / 2 <=
    ground.position.y + ground.geometry.parameters.height / 2
  ) {
    // If there's a collision, adjust the object's position to sit on top of
    // the ground
    object.position.y =
      ground.position.y +
      ground.geometry.parameters.height / 2 +
      // Move the object's Y position to the top of the platform
      object.geometry.parameters.height / 2;
  }
}

export default applyGravity;
