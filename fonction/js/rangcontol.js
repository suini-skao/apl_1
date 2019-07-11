function rating(a,b,c,d,e)// fonction pour le rang
{
    
        var vide='fa fa-star-o';
        var  rempli='fa fa-star';
        var valeur=0;
        $(a).click(function(){
            document.querySelector(a).setAttribute('class',rempli);
            var s2= document.querySelector(b);
            s2.setAttribute('class',vide)
            var s3= document.querySelector(c);
            s3.setAttribute('class',vide)
            var s4= document.querySelector(d);
            s4.setAttribute('class',vide)
            var s5= document.querySelector(e);
            s5.setAttribute('class',vide)
            valeur=1;
            document.querySelector("#notation").setAttribute('value',valeur);
            
        });
        $(b).click(function(){
            var s1= document.querySelector(a);
            s1.setAttribute('class',rempli)
            var s2= document.querySelector(b);
            s2.setAttribute('class',rempli)
            var s3= document.querySelector(c);
            s3.setAttribute('class',vide)
            var s4= document.querySelector(d);
            s4.setAttribute('class',vide)
            var s5= document.querySelector(e);
            s5.setAttribute('class',vide)
            valeur=2;
            document.querySelector("#notation").setAttribute('value',valeur);
        });
        $(c).click(function(){
            var s1= document.querySelector(a);
            s1.setAttribute('class',rempli)
            var s2= document.querySelector(b);
            s2.setAttribute('class',rempli)
            var s3= document.querySelector(c);
            s3.setAttribute('class',rempli)
            var s4= document.querySelector(d);
            s4.setAttribute('class',vide)
            var s5= document.querySelector(e);
            s5.setAttribute('class',vide)
            valeur=3;
            document.querySelector("#notation").setAttribute('value',valeur);
        });
        $(d).click(function(){
            var s1= document.querySelector(a);
            s1.setAttribute('class',rempli)
            var s2= document.querySelector(b);
            s2.setAttribute('class',rempli)
            var s3= document.querySelector(c);
            s3.setAttribute('class',rempli)
            var s4= document.querySelector(d);
            s4.setAttribute('class',rempli)
            var s5= document.querySelector(e);
            s5.setAttribute('class',vide)
            valeur=4;
            document.querySelector("#notation").setAttribute('value',valeur);
        });
        $(e).click(function(){
            var s1= document.querySelector(a);
            s1.setAttribute('class',rempli)
            var s2= document.querySelector(b);
            s2.setAttribute('class',rempli)
            var s3= document.querySelector(c);
            s3.setAttribute('class',rempli)
            var s4= document.querySelector(d);
            s4.setAttribute('class',rempli)
            var s5= document.querySelector(e);
            s5.setAttribute('class',rempli)
            valeur=5;
            document.querySelector("#notation").setAttribute('value',valeur);
        });
        

}
function gm(a,b)// donne l'apect premier du coeur du j'aime
{
    let cv="fa fa-heart-o";
    let cr="fa fa-heart";
    let info=document.querySelector(a).getAttribute("value");
    if(info=="rempli")
    {
        var s2= document.querySelector(b);
            s2.setAttribute('class',cr)
    } else { 
                var color= document.querySelector(b);
                    color.setAttribute('class',cv)
     }
     
}
function aime(a,b)// lorsqu'on aime une maison , (l'ajout)
{
    let coeurv="fa fa-heart-o";
    let coeurr="fa fa-heart";
    $(a).click(function(){
        let vide="vide";
        let rempli="rempli";
        let info=document.querySelector(a).getAttribute("value")
        if(info=="vide")
        {
            var s1= document.querySelector(a);
            s1.setAttribute('value',rempli)
            var s2= document.querySelector(b);
            s2.setAttribute('class',coeurr)
            //mise à jour de la base de donnée
            $.post(//rdv
                'fonction/php/user_ins.php', 
                   {
                ison:$("#maison").val(),
                idp : $("#mois").val()
                    },
                'text'
                );

        } else 
            {   var valeur= document.querySelector(a);
                    valeur.setAttribute('value',vide) 
                var color= document.querySelector(b);
                    color.setAttribute('class',coeurv)
                    //mise à jour de la base de donnée
                    $.post(//rdv
                        'fonction/php/user_ins.php', 
                           {
                        ison2:$("#maison").val(),
                        idp2: $("#mois").val()
                            },
                        'text'
                        );
            }
    });
    
}
function actu(a)// actualise les j'aimes
{
            $.post(//rdv
                'fonction/php/favorie.php', 
                   {
                needinfo:$("#maison").val()
                    },
                    
                    function(data){
                        
                        document.querySelector(a).textContent=data;
                    },
                'text'
                );

                setTimeout(function(){ actu(a);},100);
}