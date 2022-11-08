//var

var alturavar = 5;
var comprimentovar = 7;

var areavar = alturavar * comprimentovar;
console.log(areavar);

//let

let formalet = 'triangulo';
let alturalet = 5;
let comprimentolet = 7;
let arealet;

if (formalet === 'retangulo') {
    arealet = alturalet * comprimentolet;
} else {
    arealet = (alturalet * comprimentolet) / 2;
}

console.log(arealet);

//const 

const formaConst = 'quadrado';
const alturaConst = 5;
const comprimentoConst = 7;
let areaConst;

if (formaConst === 'quadrado') {
    areaConst = alturaConst * comprimentoConst;
} else {
    areaConst = (alturaConst * comprimentoConst) / 2;
}
console.log(areaConst);