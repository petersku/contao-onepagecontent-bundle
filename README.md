# Contao OnePage Content Bundle

This bundle create an One Page Navigation Element in Contao.

## Why

We want a sticky navigation in an article to organize the page content nicer.

## How

Create a new start ("One Page Navigation Start") and end wrapper ("One Page Navigation End") element. Add your content elements between the wrapper elements.

Add a heading to your content elements and give the elements a specific CSS ID.
With the heading and the CSS ID, the bundle creates a new navigation above the content elements with an anchor link.

### CSS Styling Example

```
.ce_onepage {
	display: flex;
	flex-direction: row;
	width: 100%;
	margin-top: 64px;
}

.ce_onepage .onepage_nav {
	max-width: 33.33%;
	flex-basis: 33.3333%;
	flex-grow: 0;	
}

.ce_onepage .onepage_content {
	max-width: 66.6666%;
	flex-basis: 66.6666%;
	flex-grow: 0;
}

.ce_onepage .onepage_nav ul{
    list-style: none;
    margin-left: 0;
    margin-top: 0;
    padding-left: 0;
    padding-top: 5px;
    position: -webkit-sticky;
    position: sticky;
    top: 100px;
}    

.ce_onepage .onepage_nav ul li{
    padding: 32px;
} 

.ce_onepage .onepage_nav ul li a {
    color: #000;
} 

.ce_onepage .onepage_nav ul li a.active {
    color: pink;
} 

.ce_onepage .onepage_content div {
	margin: 128px 0;
}

.ce_onepage .onepage_content div:first-child {
	margin-top: 0;
}
```

### Additional JS functionality for active Element Styling with GSAP Scroll Trigger

- Create a new File "js_onepage.html5" in your template Folder.
- Add the File in your Theme or as an own HTML Element in your Article 

```
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>

<script>
/* GSAP Scroll */
gsap.registerPlugin(ScrollTrigger);

//Navigationselemente
let st_nav = gsap.utils.toArray(".onepage_nav ul li a");
//Inhaltselemente
let panels = gsap.utils.toArray(".ce_text");


panels.forEach((panel, i) => {
  ScrollTrigger.create({
    trigger: panel,
    start: "top top",
	toggleClass: 'active',    
    onEnter: () => {
      gsap.set(st_nav, { className:"" });
      st_nav[i].classList.add('active');  
    },
    onEnterBack: () => {
      gsap.set(st_nav, { className:"" });
      st_nav[i].classList.add('active');  
    },
  });
});	

</script>	
```


