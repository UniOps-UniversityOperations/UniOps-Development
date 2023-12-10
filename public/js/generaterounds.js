const roundsContainer = document.querySelector('.rounds-container');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');
let currentRound = 1;

//Adding an event Listener to left & Right arrows.
leftArrow.addEventListener('click',() => showPreviousRounds());
rightArrow.addEventListener('click',() => showNextRounds()); 

//Function to generate rounds and update UI
function generateRounds(){
    roundsContainer.innerHTML = '';//Clear Existing Rounds.
    const totalRounds = 8;

    for(let i = currentRound; i<=currentRound+7;i++){
        const roundElement = document.createElement('div');
        roundElement.textContent = i;
        roundElement.classList.add('round-icon');
        roundElement.addEventListener('click',() => fetchData(i));
        roundsContainer.appendChild(roundElement);
    }
}

//Function to show nextrounds
function showNextRounds(){
    const totalRounds = 30;
    if(currentRound+8<=totalRounds){
        currentRound+=1;
        roundsContainer.classList.add('slide-left');
        generateRounds();
    }
}

//Function to show previousRounds
function showPreviousRounds(){
    if(currentRound>1){
        currentRound-=1;
        roundsContainer.classList.add('slide-right');
        generateRounds();
    }
}

// Event listener for transition end to remove the slide class
roundsContainer.addEventListener('transitionend', () => {
    roundsContainer.classList.remove('slide-left', 'slide-right');
});

//Initial generation of rounds
generateRounds();