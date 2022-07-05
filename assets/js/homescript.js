// Portfolio Desktop
$(function() {
    var winht = $(window).height(),
        winhwt = $(window).width();
    var controller = new ScrollMagic.Controller({
        container: window
    });

    $('.app-section').css('height', winht * 8);
	
	    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        offset: -winht * 2,
        duration: winht
    }).on("enter", function() {
        TweenLite.to(".titleBox .title", 1.2, {
            ease: Power4.easeInOut,
            top: "70px"
        });
        TweenLite.to(".appnav_list .appNav", 1, {
            ease: Power4.easeInOut,
            top: "500px",

        });
		TweenLite.to("#tab0 .app_title h3", 1, {
                ease: Power4.easeInOut,
                top: "45px"
        });
		TweenLite.to("#tab0 .app_txt p", 1, {
                ease: Power4.easeInOut,
                top: "100px"
        });
		TweenLite.to("#tab0 .app_img img", 1, {
                ease: Power4.easeInOut,
                top: "100vh"
        });
		TweenLite.to("#tab0", 1.3, {
                ease: Power4.easeInOut,
                css: {
                    opacity: "1",
                    visibility: "visible"
                }
        });
		
		
		
    }).addTo(controller);
	
	
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        offset: 0,
        duration: winht * 7
    }).setPin(".ins-app-sec").addTo(controller);
    var scene = new ScrollMagic.Scene({
            triggerElement: "#trigger1",
            offset: -winht * 2 / 2,
            duration: winht * 2
        }).on("enter", function() {
		TweenLite.to(".titleBox .title", 1.4, {
            ease: Power4.easeInOut,
            top: "0"
        });
		TweenLite.to(".appnav_list .appNav", 1.4, {
            ease: Power4.easeInOut,
            top: "50px"
        });
            TweenLite.to(".ins-app-sec", 1, {
                ease: Power4.easeInOut,
                css: {
                    backgroundColor: "#f4a84a"
                }
            });
			TweenLite.to(".lfTab0 a", 1, {
                ease: Power4.easeInOut,
                css: {
					background:"#fff"
                }
            });
			TweenLite.to(".lfTab1 a", 1, {
                ease: Power4.easeInOut,
                css: {
					background:"transparent"
                }
            });
			TweenLite.to(".lfTab2 a", 1, {
                ease: Power4.easeInOut,
                css: {
					background:"transparent"
                }
            });
			TweenLite.to(".lfTab3 a", 1, {
                ease: Power4.easeInOut,
                css: {
					background:"transparent"
                }
            });
			TweenLite.to(".lfTab4 a", 1, {
                ease: Power4.easeInOut,
                css: {
					background:"transparent"
                }
            });
			/*TweenLite.to(".lfTab5 a", 1, {
                ease: Power4.easeInOut,
                css: {
					background:"transparent"
                }
            });
			TweenLite.to(".lfTab6 a", 1, {
                ease: Power4.easeInOut,
                css: {
					background:"transparent"
                }
            });*/
			TweenLite.to("#tab0 .app_title h3", 1, {
              ease: Power4.easeInOut,
             top: "0"
           });
		   TweenLite.to("#tab0 .app_txt p", 1.1, {
            ease: Power4.easeInOut,
            top: "0"
          });
		 TweenLite.to("#tab0 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "0vh"
         });
		 TweenLite.to("#tab0", 1, {
            ease: Power4.easeInOut,
            css: {
                opacity: "1",
				visibility: "visible"
            }
        });
		TweenLite.to("#tab1 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "45px"
           });
		   TweenLite.to("#tab1 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "100px"
          });
		  TweenLite.to("#tab1 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "100vh"
         });
		
			
        }).addTo(controller);
		
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        offset: winht,
        duration: winht
    }).on("enter", function() {

        TweenLite.to(".ins-app-sec", 1, {
            ease: Power4.easeInOut,
            css: {
                backgroundColor: "#4fbbbd"
            }
        });
			TweenLite.to(".lfTab0 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab1 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"#fff"
                }
            });
			TweenLite.to(".lfTab2 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab3 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab4 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			/*TweenLite.to(".lfTab5 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });*/
		   TweenLite.to("#tab0 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "-45px"
           });
		   TweenLite.to("#tab0 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "-100px"
          });
		  TweenLite.to("#tab0 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "-100vh"
         });
		 
		 TweenLite.to("#tab1", 1, {
            ease: Power4.easeInOut,
            css: {
                opacity: "1",
				visibility: "visible"
            }
        });
		 TweenLite.to("#tab1 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "0"
           });
		   TweenLite.to("#tab1 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "0"
          });
		  TweenLite.to("#tab1 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "0vh"
         });


		TweenLite.to("#tab2 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "45px"
           });
		   TweenLite.to("#tab2 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "100px"
          });
		  TweenLite.to("#tab2 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "100vh"
         });

		 
		 
			
			
			
    }).addTo(controller);
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        offset: winht * 2,
        duration: winht
    }).on("enter", function() {
        TweenLite.to(".ins-app-sec", 1, {
            ease: Power4.easeInOut,
            css: {
                backgroundColor: "#79aeda"
            }
        });
			TweenLite.to(".lfTab0 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab1 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab2 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"#fff"
                }
            });
			TweenLite.to(".lfTab3 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab4 a", 1, {
                ease: Power4.easeInOut,
                css: {
                   background:"transparent"
                }
            });
			/*TweenLite.to(".lfTab5 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab6 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });*/
		  TweenLite.to("#tab0 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "-45px"
           });
		   TweenLite.to("#tab0 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "-100px"
          });
		  TweenLite.to("#tab0 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "-100vh"
         });
		 
		 TweenLite.to("#tab1 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "-45px"
           });
		   TweenLite.to("#tab1 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "-100px"
          });
		  TweenLite.to("#tab1 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "-100vh"
         });
		 
		 TweenLite.to("#tab2", 1, {
            ease: Power4.easeInOut,
            css: {
                opacity: "1",
				visibility: "visible"
            }
        });
		TweenLite.to("#tab2 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "0"
           });
		   TweenLite.to("#tab2 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "0"
          });
		  TweenLite.to("#tab2 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "0vh"
         });


		TweenLite.to("#tab3 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "45px"
           });
		   TweenLite.to("#tab3 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "100px"
          });
		  TweenLite.to("#tab3 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "100vh"
         });

		 

		 
		 



    }).addTo(controller);
    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        offset: winht * 3,
        duration: winht
    }).on("enter", function() {
        TweenLite.to(".ins-app-sec", 1, {
            ease: Power4.easeInOut,
            css: {
                backgroundColor: "#f4a84a"
            }
        });
			TweenLite.to(".lfTab0 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab1 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab2 a", 1, {
                ease: Power4.easeInOut,
                css: {
                   background:"transparent"
                }
            });
			TweenLite.to(".lfTab3 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"#fff"
                }
            });
			TweenLite.to(".lfTab4 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			/*TweenLite.to(".lfTab5 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });*/
			
		 TweenLite.to("#tab2 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "-45px"
           });
		   TweenLite.to("#tab2 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "-100px"
          });
		  TweenLite.to("#tab2 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "-100vh"
         });
		 
		 
		 TweenLite.to("#tab3", 1, {
            ease: Power4.easeInOut,
            css: {
                opacity: "1",
				visibility: "visible"
            }
        });
		TweenLite.to("#tab3 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "0"
           });
		   TweenLite.to("#tab3 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "0"
          });
		  TweenLite.to("#tab3 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "0vh"
         });

        TweenLite.to("#tab4 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "45px"
           });
		   TweenLite.to("#tab4 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "100px"
          });
		  TweenLite.to("#tab4 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "100vh"
         });

			
			
			
    }).addTo(controller);

    var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1",
        offset: winht * 4,
        duration: winht
    }).on("enter", function() {
        TweenLite.to(".ins-app-sec", 1, {
            ease: Power4.easeInOut,
            css: {
                backgroundColor: "#4fbbbd"
            }
        });
			TweenLite.to(".lfTab0 a", 1, {
                ease: Power4.easeInOut,
                css: {
                   background:"transparent"
                }
            });
			TweenLite.to(".lfTab1 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab2 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab3 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab4 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"#fff"
                }
            });
			/*TweenLite.to(".lfTab5 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });
			TweenLite.to(".lfTab6 a", 1, {
                ease: Power4.easeInOut,
                css: {
                    background:"transparent"
                }
            });*/
			
		 TweenLite.to("#tab3 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "-45px"
           });
		   TweenLite.to("#tab3 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "-100px"
          });
		  TweenLite.to("#tab3 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "-100vh"
         });
		 
		 TweenLite.to("#tab4", 1, {
            ease: Power4.easeInOut,
            css: {
                opacity: "1",
				visibility: "visible"
            }
        });
		TweenLite.to("#tab4 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "0"
           });
		   TweenLite.to("#tab4 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "0"
          });
		  TweenLite.to("#tab4 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "0vh"
         });
		 
		  /* TweenLite.to("#tab5 .app_title h3", 1, {
             ease: Power4.easeInOut,
             top: "45px"
           });
		   TweenLite.to("#tab5 .app_txt p", 1.2, {
            ease: Power4.easeInOut,
            top: "100px"
          });
		  TweenLite.to("#tab5 .app_img img", 1.5, {
            ease: Power4.easeInOut,
            top: "100vh"
         });*/


			
    }).addTo(controller);
    
});