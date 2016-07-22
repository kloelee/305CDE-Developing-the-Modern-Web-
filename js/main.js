enchant();   
var rand = function(num){
    
	return Math.floor(Math.random()*num);
};

var Diamond = enchant.Class.create(enchant.Sprite,{
	initialize:function(){
		enchant.Sprite.call(this,16,16);
		this.image = game.assets['/img/icon0.png'];
		this.frame = 64;
		this.x = rand(320);
		this.y = -16;
		this.speed = rand(3);
		this.addEventListener('enterframe',function(){
          this.y += this.speed;
          if(this.y>336){
          	this.remove();
          	game.life --;
            if (game.life <0){
              game.end(game.score,"Your score is " + game.score);
            };
          	lifeLabel.text = "LIFE: " + game.life;
          }
          if (this.intersect(bear)){
          	this.remove();
          	game.score ++;
          	scoreLabel.text = "SCORE: " + game.score;
          };
        });
        game.rootScene.addChild(this);
	},
	remove:function(){
		game.rootScene.removeChild(this);
	}
});

var Bear =  enchant.Class.create(enchant.Sprite,{
    initialize:function(){
        enchant.Sprite.call(this,32,32);
        this.image = game.assets['/img/chara1.gif'];
        this.x = 160;
        this.y = 320-32;
        this.frame = 0;
        this.addEventListener('touchstart',
            function(e){this.x = e.x-16; game.touched = true;});
        this.addEventListener('touchend',
            function(e){this.x = e.x-16; game.touched = false;});
       	this.addEventListener('touchmove',
            function(e){this.x = e.x-16;});
        game.rootScene.addChild(this);
    }
});

window.onload = function() {
    game = new Game(320, 320);  
    game.score = 0; 
    game.life = 3;
    game.touched = false;
    game.preload('/img/icon0.png');
    game.preload('/img/chara1.gif');
    scoreLabel = new Label("SCORE: " + game.score);
    scoreLabel.x = 5;
    scoreLabel.y = 5;
    scoreLabel.color = "white";
    game.rootScene.addChild(scoreLabel);

    lifeLabel = new Label("LIFE: " + game.life);
    lifeLabel.x = 5;
    lifeLabel.y = 20;
    lifeLabel.color = "white";
    game.rootScene.addChild(lifeLabel);
    game.onload = function() {
       
        game.rootScene.backgroundColor = "black"; 
        bear = new Bear();
        game.rootScene.addEventListener('enterframe',function(){
          	if (game.frame% 6 ==0){
          		var diamond = new Diamond();
          	}
        });
    }
    game.start(); //開始遊戲
}