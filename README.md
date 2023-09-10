# astrodump
A simple format I devised for storing my astrophotography.  
You can see it in action here: https://s1.danielc.dev/astro

## File Structure
Alongside the index.php file, folders are created for each  
astronomy night, or session, with the name being the date.  

Inside each folder, a `description` file is created describing  
Bortle levels, processing information, settings, etc.  

The web server should show the contents of these folders (Nginx  
`autoindex`)  
