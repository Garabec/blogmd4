onload=function(){
var obj;
var i;
for(i=1;i<6;i++){

obj=document.getElementById("cena"+i);
obj.onmouseover=function(){this.style.color='red'; this.style.fontSize='30px';   };
obj.onmouseout=function(){this.style.color='blue'; this.style.fontSize='20px';   };

obj=document.getElementById("name"+i);
obj.onmouseover=function(){this.style.color='red'; this.style.fontSize='30px';   };
obj.onmouseout=function(){this.style.color='blue'; this.style.fontSize='20px';   };
// obj=document.getElementById("name");
// obj.onmouseover=overS;
// obj.onmouseout=outS;
}
//  };
 
// function overS(){
// this.size=33;
// this.value='size=33';
//  };
 
// function outS(){
// this.size=5;
// this.value='size=5';
 };