// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-3/Modules/JoomSearch/trunk/media/mod_joomsearch.js $
// $Id: mod_joomsearch.js 4147 2013-03-16 18:52:45Z erftralle $
var JoomSearchModule = new Class({
  Implements: [Options, Events],
  
  options:
  {
    searchurl: "",
    moduleid: 0,
    noresultstxt: 'No results',
    baseURL: ''
  },
  
  initoptions: function(){
    if(this.jsupcatorimg != null)
    {
      this.jsupcatorimg.fireEvent('change');
    }
  },

  initialize: function(options)
  {
    this.setOptions(options);
    $(document.body).adopt(new Element("div", {id: 'js_searchresults' + this.options.moduleid}));
    // Form
    this.jsform = $('js_searchform' + this.options.moduleid);
    // Search input field of form
    this.jssearchinput = $('js_searchinput' + this.options.moduleid);
    // Search results window
    this.jssearchresults = $('js_searchresults' + this.options.moduleid);
    // Make the results window ready for drag'n'drop
    this.resultsdragmove = new Drag.Move(this.jssearchresults);
    // Save the background style of search input field to restore it later
    this.jssearchinputCSS = this.jssearchinput.getStyle('background');
    // For IE
    if(typeof jssearchinputCSS == 'undefined')
    {
      this.jssearchinputCSS = null;
    }

    // User panel options, first check if exists
    // Limit
    if($('js_limit' + this.options.moduleid) != null)
    {
      this.jslimit = $('js_limit' + this.options.moduleid);
      this.jslimit.addEvent('blur', function(e)
      {
        // Store modified cookie
        this.setcookie();
      }.bind(this));
    }
    else
    {
      this.jslimit = null;
    }
    // Search mode
    if($('js_catorimg' + this.options.moduleid) != null)
    {
      this.jsupcatorimg = $('js_catorimg' + this.options.moduleid);
    }
    else
    {
      this.jsupcatorimg = null;
    }
    // Image description
    if($('js_imgdescr' + this.options.moduleid) != null)
    {
      this.js_imgdescr = $('js_imgdescr' + this.options.moduleid);
      this.jsimgdescrSlide = new Fx.Slide('js_imgdescr' + this.options.moduleid);
      this.js_imgdescr.addEvent('change', function(e)
      {
        // Store modified cookie
        this.setcookie();
      }.bind(this));
    }
    else
    {
      this.jsimgdescrSlide = null;
    }
    // Search comments
    if($('js_comments' + this.options.moduleid) != null)
    {
      this.js_comments = $('js_comments' + this.options.moduleid);
      this.jscommentsSlide = new Fx.Slide('js_comments' + this.options.moduleid);
      this.js_comments.addEvent('change', function(e)
      {
        // Store modified cookie
        this.setcookie();
      }.bind(this));
    }
    else
    {
      this.jscommentsSlide = null;
    }

    // Search authors
    if($('js_authors' + this.options.moduleid) != null)
    {
      this.js_authors = $('js_authors' + this.options.moduleid);
      this.jsauthorsSlide = new Fx.Slide('js_authors' + this.options.moduleid);
      this.js_authors.addEvent('change', function(e)
      {
        // Store modified cookie
        this.setcookie();
      }.bind(this));
    }
    else
    {
      this.jsauthorsSlide = null;
    }

    // Search category description
    if($('js_catdescr' + this.options.moduleid) != null)
    {
      this.js_catdescr = $('js_catdescr' + this.options.moduleid);
      this.jscatdescrSlide = new Fx.Slide('js_catdescr' + this.options.moduleid);
      this.js_catdescr.addEvent('change', function(e)
      {
        // Store modified cookie
        this.setcookie();
      }.bind(this));
    }
    else
    {
      this.jscatdescrSlide = null;
    }

    // Initial position of results window
    this.jsformtop = document.body.parentNode.scrollTop + 20;
    this.jsformleft = parseInt((document.body.offsetWidth/2) - (this.jssearchresults.offsetWidth/2), 10);
    this.jsresultsfirstpos = true;

    // No results HTML
    // TODO individual tag instead of h3
    this.jsnoresultshtml = '<h3 id="js_noresults">' + this.options.noresultstxt + '</h3>';

    // initially hide the results windows
    this.jssearchresults.setStyles({
      'visibility' : 'hidden'
    });

    // *** Effects ***
    // Fade in/out for results window
    this.resultsfx = new Fx.Morph(this.jssearchresults, {
      duration: 500,
      wait: false,
      transition: Fx.Transitions.Quad.easeOut
    });
    // Scroll to top in result window
    this.resultsscroll = new Fx.Scroll(this.jssearchresults);
    // *** end Effects ***

    // *** Events ***
    // Resize of browser window
    window.addEvent('resize',function(e)
    {
      if(this.jsresultsfirstpos)
      {
        this.jssearchresults.setStyles( {
          'left' : this.jsformleft + 'px',
          'top'  : this.jsformtop + 'px'
        });
        this.jsresultsfirstpos = false;
      }
    }.bind(this));

    this.jssearchinput.addEvent('keydown', this.sendsearch.bind(this));

    // Show/hide options in user panel dependent on search mode
    // only if activated
    if(this.jsupcatorimg != null)
    {
      this.jsupcatorimg.addEvent('change', function(e)
      {
        if(this.jsupcatorimg.value == 0)
        {
          // Category search
          if (this.jsimgdescrSlide != null) this.jsimgdescrSlide.slideOut();
          if (this.jscommentsSlide != null) this.jscommentsSlide.slideOut();
          if (this.jsauthorsSlide != null) this.jsauthorsSlide.slideOut();
          if (this.jscatdescrSlide != null) this.jscatdescrSlide.slideIn();
        }
        else
        {
          // Image search
          if (this.jsimgdescrSlide != null) this.jsimgdescrSlide.slideIn();
          if (this.jscommentsSlide != null) this.jscommentsSlide.slideIn();
          if (this.jsauthorsSlide != null) this.jsauthorsSlide.slideIn();
          if (this.jscatdescrSlide != null) this.jscatdescrSlide.slideOut();
        }
        // Store all values in cookie
        this.setcookie();
      }.bind(this));
    }
    // Clicking in browser window fades out the results window if visible
    // document for IE
    document.addEvent('click', function(e)
    {
      if (this.jssearchresults.getStyles('visibility').visibility != 'hidden')
      {
        this.resultsfx.start({
          'opacity':0,
          'visibility':'hidden'
        });
        //scroll results to the top
        this.resultsscroll.toTop();
      }
    }.bind(this));

    // Scroll at scroll bars, avoid dragging
    this.jssearchresults.addEvent('scroll', function(e)
    {
      // Avoid dragging when clicked on scroll bar
      this.resultsdragmove.stop();
    }.bind(this));

    // Click on results window doesn't fades it out except when clicking on links
    this.jssearchresults.addEvent('click', function(e)
    {
      // Get the target element, different in IE
      var targettag=(e.target) ? $(e.target,'tag').nodeName : e.srcElement.nodeName;
      if (this.jssearchresults.getStyles('visibility').visibility != 'hidden' &&
          (targettag == 'A' || targettag == 'IMG'))
      {
        this.resultsfx.start({
          'opacity': [1,0]
        });
        // Scroll results to the top
        this.resultsscroll.toTop();
      }
      else
      {
        e.stop();
      }
    }.bind(this));

    // Submitting the form
    this.jsform.addEvent('submit', this.sendsearch.bind(this));
  },

  sendsearch: function(e){

  // key pressed not enter, return
    if(e.type=='keydown' && e.key != null && e.key != "enter")
    {
      return;
    }

    // Prevents a search with empty input
    if(this.jssearchinput.value.length == 0)
    {
      // Prevent the submit event
      e.stop();
      return;
    }

    // Prevent the submit event
    e.stop();
    
    // Activate the spinner.gif of input field
    // Save the image setting from CSS
    this.jssearchinput.setStyles({
        'background-image' : 'url(' + this.options.baseURL + 'media/mod_joomsearch/spinner.gif)',
        'background-repeat' : 'no-repeat',
        'background-position' : 'right'
    });

    this.jsform.set('send',{
      onComplete: function(response)
      {
        this.jssearchresults.set('html', response);
        //initial position of results window
        if(this.jsresultsfirstpos == true)
        {
          this.jssearchresults.setStyles( {
            'left' : this.jsformleft + 'px',
            'top'  : this.jsformtop + 'px'
          });
          this.jsresultsfirstpos = false;
        }
        // get results from the delivered HTML
        var resultsfound = false;

        // Standard Beez 2.0/Beez 5.0
        // var result = this.jssearchresults.getElement('dl');
        var result = this.jssearchresults.getElementsByClassName('search-results')[0];
        if(result != null)
        {
          this.jssearchresults.innerHTML = result.innerHTML;
          resultsfound = true;
        }

        // No results found
        if(resultsfound == false)
        {
          this.jssearchresults.innerHTML = this.jsnoresultshtml;
        }
        // Deactivate the spinner.gif of input field
        // Restore formerly settings of CSS background, if set
        if(this.jssearchinputCSS != null)
        {
          this.jssearchinput.setStyle('background', this.jssearchinputCSS);
        }
        else
        {
          //otherwise remove the styles
          this.jssearchinput.setStyles({
            'background-image' : 'none',
            'background-repeat' : '',
            'background-position' : ''
          });
        }
        // Fade in the results window
        this.resultsfx.start({
          'opacity':1,
          'visibility':'visible'
       });
      }.bind(this)
    });
    // Send the form.
    this.jsform.send(this.options.searchurl);
  },

  setcookie: function()
  {
    var cookiestring = '';
    var cookiename = 'joomsearch' + this.options.moduleid;
    // Limit
    if(this.jslimit != null)
    {
      limitval = this.jslimit.value;
      tmp = parseInt(limitval * 1, 10);
      cookiestring = tmp + '-';
    }
    else
    {
      cookiestring = '0-';
    }

    if(this.jsupcatorimg != null)
    {
      cookiestring = cookiestring + this.jsupcatorimg.selectedIndex + '-';
    }
    else
    {
      cookiestring = cookiestring + '0-';
    }

    // Image description, check if option no (0) activated
    if(this.js_imgdescr != null)
    {
      if($('js_imgdescrno' + this.options.moduleid).checked)
      {
        cookiestring = cookiestring + '0-';
      }
      else
      {
        cookiestring = cookiestring + '1-';
      }
    }
    else
    {
      cookiestring = cookiestring + '0-';
    }

    // Comments
    if(this.js_comments != null)
    {
      if($('js_commentsno' + this.options.moduleid).checked)
      {
        cookiestring=cookiestring + '0-';
      }
      else
      {
        cookiestring=cookiestring + '1-';
      }
    }
    else
    {
      cookiestring=cookiestring + '0-';
    }

    // Search authors
    if(this.js_authors != null)
    {
      if($('js_authorsno' + this.options.moduleid).checked)
      {
        cookiestring = cookiestring + '0-';
      }
      else
      {
        cookiestring = cookiestring + '1-';
      }
    }
    else
    {
      cookiestring=cookiestring + '0-';
    }

    // Search category description
    if(this.js_catdescr != null)
    {
      if($('js_catdescrno' + this.options.moduleid).checked)
      {
        cookiestring = cookiestring + '0';
      }
      else
      {
        cookiestring = cookiestring + '1';
      }
    }
    else
    {
      cookiestring = cookiestring + '0';
    }
    document.cookie = cookiename + '= ' + cookiestring;
  }
});