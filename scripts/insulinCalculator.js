function calculate_required_insulin() {
  const carbsPer100 = $('#carbsPer100').val();
  const gramsOnScale = $('gramsOnScale').val();
  const insulinRatio = $('insulinRatio').val();

  const carbsPerGram = carbsPer100 / 100;
  const totalGramsCarbs = carbsPerGram * gramsOnScale;
  const insulinNeeded = (totalGramsCarbs / 10) * insulinRatio;
  return {
    "totalCarbs": totalGramsCarbs,
    "insulinRequired": insulinNeeded
  };
}

$(document).ready(() => {
  $('#calculateInsulin').on('click', () => {
    const result = calculate_required_insulin();
    
    $('#carbsResult').text(`Total carbs: ${result.totalCarbs}.`);
    $('#insulinResult').text(`Insulin required: ${result.insulinRequired}.`);
  });
});