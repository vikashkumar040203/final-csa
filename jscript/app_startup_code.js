//######################################################################

// ### 2. MAKE A PREDICTION ON THE FRONT PAGE IMAGE WHEN THE PAGE LOADS

//######################################################################

// After the model loads we want to make a prediction on the default image.
// Thus, the user will see predictions when the page is first loaded.

function simulateClick(tabID) {
  document.getElementById(tabID).click();
}

// This make a met_cancer prediction when the page loads.
// met cancer model images have size 96x96
$("#predict-button").click(async function () {
  let image = undefined;

  image = $("#selected-image").get(0);

  // Pre-process the image
  let tensor = tf
    .fromPixels(image)
    .resizeNearestNeighbor([96, 96]) // change the image size here
    .toFloat()
    .div(tf.scalar(255.0))
    .expandDims();

  // Pass the tensor to the model and call predict on it.
  // Predict returns a tensor.
  // data() loads the values of the output tensor and returns
  // a promise of a typed array when the computation is complete.
  // Notice the await and async keywords are used together.
  let predictions = await met_cancer_model.predict(tensor).data();
  let top5 = Array.from(predictions)
    .map(function (p, i) {
      // this is Array.map
      return {
        probability: p,
        className: MET_CANCER_CLASSES[i],
      };
    })
    .sort(function (a, b) {
      return b.probability - a.probability;
    })
    .slice(0, 2);

  // Append the file name to the prediction list
  var file_name = "default_image.jpg";
  $("#prediction-list").append(`<li class="w3-text-teal">${file_name}</li>`);

  //$("#prediction-list").empty();
  top5.forEach(function (p) {
    $("#prediction-list").append(
      `<ol>${p.className}: ${p.probability.toFixed(6)}</ol>`
    );
  });
});
