require('./bootstrap');
try{
    require('vide');
}catch(e){
    console.error("jQuery not found!")
    console.error(e)
}
