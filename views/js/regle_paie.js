var output = document.getElementById('output');
var input = document.getElementById('input');

var rubriques = 
{
  '':'Coose...',
  '()':'(Parenthèses)',
  'number':'Entrer un nombre',
  'SB': 'Salaire de base',
  'CNSS':'CNSS',
  'CIMR':'CIMR',
  'AMO':'AMO',
  'IGR':'IGR',
  'PA':'Prime d\'anciennte',
  'HS':'Heures supplementaires',
  'MAJ':'Majorations',
  'RET':'Retenues',
  'AllocationF':'Allocation familiale'
};
var operateurs = 
{
  '':'Coose...',
  '+':'+',
  '-':'-',
  '*':'*',
  '/':'/'
};

function print_regle ()
{
  output.value = "";
  let inputs = input.getElementsByClassName('input');
  for (let input of inputs) 
  {
    console.log(input.value);
    output.value += input.value;
  }
}

function add_input (type, position, size)
{
  let div = document.createElement("div");
  div.classList.add("col-md-"+size);
  div.classList.add("p-1");
  let numberIn = document.createElement("input");
  numberIn.classList.add("input");
  numberIn.classList.add("form-control");
  numberIn.setAttribute('type', type);
  numberIn.setAttribute('step', 'any');
  numberIn.setAttribute('placeholder', 'Valeur');
  numberIn.setAttribute('required', 'required');
  div.appendChild(numberIn);
  input.insertBefore(div,position);
  numberIn.addEventListener('change', () => {
    print_regle();
  })
}

function add_button (position)
{
  let div = document.createElement("div");
  div.classList.add("col-md-1");
  let span = document.createElement("span");
  span.classList.add("badge");
  span.classList.add("badge-opacity-info");
  span.classList.add("mt-2");
  span.setAttribute('role','button');
  let i = document.createElement("i");
  i.classList.add("mdi");
  i.classList.add("mdi-plus");
  div.appendChild(span);
  span.appendChild(i);
  input.insertBefore(div, position);
  span.addEventListener('click', (event) => {
    regle_paie(event.target.parentNode);
  })
}

function add_select (array, position, size)
{
  let div = document.createElement("div");
  div.classList.add("col-md-"+size);
  div.classList.add("p-1");
  let select = document.createElement("select");
  select.classList.add("input");
  select.classList.add("form-control");
  select.setAttribute('required', 'required');
  div.appendChild(select);
  input.insertBefore(div,position);
  select.addEventListener('change', (event) => {
    if (event.target.value === '()')
    {
      add_select({'(':'('}, event.target.parentNode, 1);
      add_select(rubriques, event.target.parentNode, 2);
      add_select(operateurs, event.target.parentNode, 1);
      add_select(rubriques, event.target.parentNode, 2);
      add_button(event.target.parentNode);
      add_select({')':')'}, event.target.parentNode, 1);
      input.removeChild(event.target.parentNode);
    }
    else if (event.target.value === 'number')
    {
      add_input('number',event.target.parentNode, 2);
      input.removeChild(event.target.parentNode);
    }
    print_regle();
  })
  //Create and append the options
  for (let key in array)
  {
    let option = document.createElement("option");
    option.value = key;
    option.text = array[key];
    select.appendChild(option);
  }
  select.options[0].setAttribute('disibale','disibale');
}

function verifier_imput ()
{
  let inputs = input.getElementsByClassName('input');
  for (let input of inputs) 
  {
    if (input.value === "") 
    {
      input.style.border = '1px solid red';
      return false;
    }
    else input.style.border = '1px solid black';
  }
  return true;
}

function regle_paie (position)
{
  if (!verifier_imput()) return;
  add_select(operateurs, position, 1);
  add_select(rubriques, position, 2);
}

add_select (rubriques, document.getElementById('add'), 2);