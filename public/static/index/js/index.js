  function selectCity(){
            this.btn=document.getElementById('selectCity');
            this.CityLi=document.getElementsByClassName('current');
            this.city=document.getElementById('city');
            this.sh=false;
            this.part=this.CityLi[0];
            this.cityInput = document.getElementById('cityInput');
            this.cityInput.value = this.part.getAttribute('data-city');
        };
        selectCity.prototype.show=function(e){
            // console.log(1)
            if(!this.sh){
                this.city.className='drop-select';
                this.sh=true;
            }else{
                this.city.className='drop-select drop-select-hide';
                this.sh=false;
            }
            var that =this;
            this.stopBubble(e);
            this.bodyonclick(that);

        }
        selectCity.prototype.bodyonclick=function(that){
            // console.log(2)
            document.body.onclick = function(){
                // console.log(3)
                // var evt = window.event || arguments[0];
                that.city.className='drop-select drop-select-hide';
                that.sh=false;
                document.onmousedown = null;
            }
        }
        selectCity.prototype.stopBubble=function(e){//取消冒泡
            if(e){
                e.stopPropagation();
            }
            else{
                window.event.cancelBubble=true;
            }
        }

        selectCity.prototype.getCity = function(e){
            var evt = window.event || arguments[0]; 
            evt.cancelBubble = true;
            // console.log(this.part);
            this.stopBubble(e);
            this.btn.innerHTML=evt.srcElement.innerText+'<i class="icon icon-arrow-bottom"></i>';
            this.part.className='city';
            evt.srcElement.className='city current';
            this.part=evt.srcElement;
            this.cityInput.value = this.part.getAttribute('data-city');
            this.city.className='drop-select drop-select-hide';
            this.sh=false;
        }
        var selex = new selectCity();


// 轮播
        function Banner() {
                this.speed = 0;
                this.timer = null;
                this.iTarget = 0;
                this.key = 0;
                this.key1=0;
                this.doms = {
                    list: document.getElementById("sliderCov"),
                    prev_p: document.getElementById("prev"),
                    next_p: document.getElementById("next")
                }
                this.ali = document.getElementsByClassName("slides");
                this.bindEvent()//事件绑定
                
            }
            Banner.prototype = {
                nextAll: function(id,that) {
                    // console.log(this.ali)
                    this.key1=this.key;
                    if(id==1){
                        that.key=++that.key%3;
                    }
                    else{
                        that.key--;
                        that.key=that.key<0?2:that.key;
                        that.ali[that.key].style.left=-that.ali[that.key].offsetWidth+'px';
                    }
                    //offsetWidth
                    //left:0,target:-1423;left:1423,target:0;left:-1423,target:0

                    // console.log(this.ali[that.key].offsetWidth);
                    that.iTarget=0;
                    // console.log(that.key);
                    // console.log(this.ali[that.key]);
                    that.buff(that,this.ali[that.key])
                    that.ali[that.key1].style.zIndex=1;
                },
                //鼠标移在轮播上的事件
                onover:function(){
                    var that=this;
                    this.doms.list.onmouseover = function(){
                        // console.log(1);
                        clearInterval(this.timer);
                    }
                },
                //鼠标移开事件
                onout:function(){
                    var that=this;
                    this.doms.list.onmouseout = function(){
                        // console.log(2);
                        that.autoplay();
                    }
                },

                //下一张
                next: function() {
                    var that = this;
                 // console.log(this)
                    that.doms.next_p.onclick=function(){
                        that.nextAll(1,that)
                    }
                },
                //上一张
                prev: function() {
                    var that = this;
                    that.doms.prev_p.onclick=function(){
                        that.nextAll(-1,that)
                    }
                },
                //自动轮播
                autoplay: function() {
                    var that=this;
                    clearInterval(this.timer)
                    // console.log(this)
                    this.timer=setInterval(function(){
                        that.nextAll(1,that)
                    },15000)
                },
                //buff运动
                buff: function(that,obj) {
                    //目标点，运动对象
                    // console.log(obj);
                    obj.style.zIndex=3;
                    clearInterval(obj.timer)
                    obj.timer = setInterval(function() {
                        that.speed = (that.iTarget - obj.offsetLeft) / 10;
                        // console.log(that.speed)
                        that.speed = that.speed > 0 ? Math.ceil(that.speed) : Math.floor(that.speed);
                        obj.style.left = obj.offsetLeft + that.speed + "px"
                        // console.log(obj.offsetLeft);
                        if(that.speed == 0) {
                            clearInterval(obj.timer)
                            that.ali[that.key1].style.left=obj.offsetWidth+'px';
                        }
                    }, 30)
                },
               
                //绑定事件
                bindEvent: function() {
                    this.next();
                    this.prev();
                    this.autoplay();
                    this.onover();
                    this.onout();
                }

            }

            var p1 = new Banner();
            //console.log(p1)