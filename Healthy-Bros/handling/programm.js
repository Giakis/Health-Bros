// AGE INPUT TEST
const input = document.getElementById("fage");
const error = document.getElementById('error');

input.addEventListener('input', (e) => {
  const value = e.target.value;

  if (isNaN(Number(value))) {
    input.value = value.slice(0, 0)//value.length - 1);
    error.textContent = 'Age cannot contain characters , only numbers and .';
  } else {
    error.textContent = '';
  }
});

// WEIGHT INPUT TEST
const inputWeight = document.getElementById("fweight");
inputWeight.addEventListener('input', (e) => {
  const value = e.target.value;

  if (isNaN(Number(value))) {
    inputWeight.value = value.slice(0, 0)//value.length - 1);
    error.textContent = 'Weights cannot contain characters , only numbers and .';
  } else {
    error.textContent = '';
  }
});

// HEIGHT INPUT TEST
const inputHeight = document.getElementById("fheight");
inputHeight.addEventListener('input', (e) => {
  const value = e.target.value;

  if (isNaN(Number(value))) {
    inputHeight.value = value.slice(0, 0)//value.length - 1);
    error.textContent = 'Height cannot contain characters , only numbers and .';
  } else {
    error.textContent = '';
  }
});
