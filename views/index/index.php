<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script <?php echo 'src="https://maps.googleapis.com/maps/api/js?key='.GOOGLE_MAPS_KEY.'&callback=initMap"';?>
    async defer></script>
    <script>
    
    if(!String.prototype.trim) {  
        String.prototype.trim = function () {  
            return this.replace(/^\s+|\s+$/g,'');  
        };  
    }
    
    function lsTest(){
        
        var __test = "test";
        try{
            
            localStorage.setItem(test, __test);
            localStorage.removeItem(test);
            return true;
        } catch(e){
            
            return false;
        }
    }
    
        
        
        Storage.prototype.setObject = function(key, value){
            
            this.setItem(key, JSON.stringify(value));
        };
        
        Storage.prototype.getObject = function(key){
            
            var __value = this.getItem(key);
            return JSON.parse(__value);
        };
   
    
    function generateUUID(){
        var d = new Date().getTime();
        if(window.performance && typeof window.performance.now === "function"){
            d += performance.now(); //use high-precision timer if available
        }
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = (d + Math.random()*16)%16 | 0;
            d = Math.floor(d/16);
            return (c=='x' ? r : (r&0x3|0x8)).toString(16);
        });
        
        return localStorage.getObejct(uuid) ? generateUUID() : uuid;
    }   
    
    
    
    // missing david and richard, dean, tim, vizinha da erin, alvin
  var __CLIENTS_FULL_LIST__ = [
   {
      "Organization": "Masud Mazumder",
      "FirstName": "Masud",
      "LastName": "Mazumder",
      "Email": "masud.mazumder@gmail.com",
      "Street": "10920 NE 194th Dr",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98011,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "+1 (213) 804-8656",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45, in an every other week schedule.",
      "lat": 47.76875,
      "lng": -122.194855
   },
   {
      "Organization": "Asta Mboup",
      "FirstName": "Asta",
      "LastName": "Mboup",
      "Email": "Asta.mboup@gmail.com",
      "Street": "8426 229th Dr NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "+1 (240) 432-5489",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $25, in an every other week schedule.",
      "lat": 47.678154,
      "lng": -122.03385
   },
   {
      "Organization": "Saurabh Mangal",
      "FirstName": "Saurabh",
      "LastName": "Mangal",
      "Email": "Saurabhmangal@gmail.com",
      "Street": "813 235th Ave NE",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "+1 (206) 265-0241",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45, in an every other week schedule.",
      "lat": 47.616905,
      "lng": -122.026886
   },
   {
      "Organization": "Tom Carmony",
      "FirstName": "Tom",
      "LastName": "Carmony",
      "Email": "tom@northleft.net",
      "Street": "8002 Wallingford Ave N",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98103,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2069650309,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $60, in an every other week schedule.",
      "lat": 47.68713,
      "lng": -122.33614
   },
   {
      "Organization": "Tatyana Tchibova",
      "FirstName": "Tatyana",
      "LastName": "Tchibova",
      "Email": "DoNotHave@Email.com",
      "Street": "1832 221st Pl NE",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "+1 (425) 503-3947",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70, in an every other week schedule.",
      "lat": 47.626747,
      "lng": -122.04455
   },
   {
      "Organization": "Michael Parker",
      "FirstName": "Michael",
      "LastName": "Parker",
      "Email": "mlparker@uw.edu",
      "Street": "10706 181st Ave NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98052,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(206) 390-6531",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45, in an every other week schedule.",
      "lat": 47.695766,
      "lng": -122.099205
   },
   {
      "Organization": "Nataly Pasumansky",
      "FirstName": "Nataly",
      "LastName": "Pasumansky",
      "Email": "npasumansky@gmail.com",
      "Street": "3005 177th Ave NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98052,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(206) 714-1737",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $80, in an every other week schedule.",
      "lat": 47.63725,
      "lng": -122.10395
   },
   {
      "Organization": "Saul Vazquez",
      "FirstName": "Saul",
      "LastName": "Vazquez",
      "Email": "saul.d.rdz@gmail.com",
      "Street": "23022 NE 19th Dr",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(310) 913-4650",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $40, in an every other week schedule.",
      "lat": 47.62724,
      "lng": -122.03252
   },
   {
      "Organization": "Anita Olmstead",
      "FirstName": "Anita",
      "LastName": "Olmstead",
      "Email": "DoNotHave@Email.com",
      "Street": "1828 221st Pl NE",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4259419509,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $55, in an every other week schedule.",
      "lat": 47.626602,
      "lng": -122.044044
   },
   {
      "Organization": "Qian Tang",
      "FirstName": "Qian",
      "LastName": "Tang",
      "Email": "huiling4404@yahoo.com",
      "Street": "21521 SE 3rd Pl",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70, in an every other week schedule.",
      "lat": 47.605743,
      "lng": -122.0527
   },
   {
      "Organization": "Matt Kirk",
      "FirstName": "Matt",
      "LastName": "Kirk",
      "Email": "meteor.kirk@gmail.com",
      "Street": "18810 66th Ave NE",
      "Street2": "",
      "City": "Kenmore",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98028,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "+1 (206) 409-6413",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $80, in a every month schedule.",
      "lat": 47.765347,
      "lng": -122.252426
   },
   {
      "Organization": "Stan Morse",
      "FirstName": "Stan",
      "LastName": "Morse",
      "Email": "Staniii@me.com",
      "Street": "10212 NE 156th Pl",
      "Street2": "",
      "City": "Bothell",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98011,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(425) 354-0904",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70, In an every other week schedule.",
      "lat": 47.741764,
      "lng": -122.20503
   },
   {
      "Organization": "Ryan Redington",
      "FirstName": "Ryan",
      "LastName": "Redington",
      "Email": "ryanred22@gmail.com",
      "Street": "10007 Radford Ave NW",
      "Street2": "",
      "City": "Seattle",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98117,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2062267830,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "",
      "lat": 47.701691,
      "lng": -122.382278
   },
   {
      "Organization": "Vanessa",
      "FirstName": "Vanessa",
      "LastName": "",
      "Email": "pa_goo@hotmail.com",
      "Street": "6552 192nd Pl NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98052,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $30, in an every other week schedule.",
      "lat": 47.664814,
      "lng": -122.08304
   },
   {
      "Organization": "William Pessoa",
      "FirstName": "William",
      "LastName": "Pessoa",
      "Email": "wpessoa@gmail.com",
      "Street": "6458 167th Ln SE",
      "Street2": "",
      "City": "Bellevue",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98004,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45, in an every other week schedule.",
      "lat": 47.544174,
      "lng": -122.11672
   },
   {
      "Organization": "Audrey Benitah",
      "FirstName": "Audrey",
      "LastName": "Benitah",
      "Email": "audrey.benitah@gmail.com",
      "Street": "4682 148th Pl SE",
      "Street2": "",
      "City": "Bellevue",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98006,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(425) 623-4563",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "",
      "lat": 47.56169,
      "lng": -122.14193
   },
   {
      "Organization": "Melanie Jordan",
      "FirstName": "Melanie",
      "LastName": "Jordan",
      "Email": "DontHave@aEmail.com",
      "Street": "21027 NE 17th St",
      "Street2": "",
      "City": "Sammamish",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70, in an every other week schedule.",
      "lat": 47.62414,
      "lng": -122.05994
   },
   {
      "Organization": "Sarah Aebersold",
      "FirstName": "Sarah",
      "LastName": "Aebersold",
      "Email": "DontHave@aEmail.com",
      "Street": "24201 SE 42nd Pl",
      "Street2": "",
      "City": "Issaquah",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98029,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(425) 295-1374",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70, in an every other week schedule.",
      "lat": 47.567924,
      "lng": -122.01996
   },
   {
      "Organization": "Dave Reed",
      "FirstName": "Dave",
      "LastName": "Reed",
      "Email": "dkrst13@gmail.com",
      "Street": "20914 NE 19th Pl",
      "Street2": "",
      "City": "Sammamish",
      "Province": "",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4257364671,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70, in an every other week schedule.",
      "lat": 47.627254,
      "lng": -122.061005
   },
   {
      "Organization": "Mystiana Rulean",
      "FirstName": "Mystiana",
      "LastName": "Rulean",
      "Email": "Mystiana@rulean.org",
      "Street": "3307 181st Pl NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "",
      "Country": "United States",
      "PostalCode": 98052,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(206) 407-9154",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45, in every other week schedule.",
      "lat": 47.638493,
      "lng": -122.09825
   },
   {
      "Organization": "Dianne Lee",
      "FirstName": "Dianne",
      "LastName": "Lee",
      "Email": "DontHaveEmail@dont.com",
      "Street": "8002 Wallingford Ave N",
      "Street2": "",
      "City": "Seattle",
      "Province": "",
      "Country": "United States",
      "PostalCode": 98103,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(206) 965-0309",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $60, in an every other week schedule.",
      "lat": 47.68713,
      "lng": -122.33614
   },
   {
      "Organization": "Binyan Chen",
      "FirstName": "Binyan",
      "LastName": "Chen",
      "Email": "chenbinyan130@gmail.com",
      "Street": "16849 NE 6th St",
      "Street2": "",
      "City": "Bellevue",
      "Province": "",
      "Country": "United States",
      "PostalCode": 98008,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 9178685794,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance just weeding $45(if weed and mow $70)",
      "lat": 47.61545,
      "lng": -122.11474
   },
   {
      "Organization": "Ali Zia",
      "FirstName": "Ali",
      "LastName": "Zia",
      "Email": "ziaali@gmail.com",
      "Street": "14357 109th Ave NE",
      "Street2": "",
      "City": "Kirkland",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98034,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Every other week schedule, and $45 maintenance price",
      "lat": 47.73211,
      "lng": -122.19544
   },
   {
      "Organization": "Varun Karandikar",
      "FirstName": "Varun",
      "LastName": "Karandikar",
      "Email": "varun.karandikar@gmail.com",
      "Street": "11724 114th Pl NE",
      "Street2": "",
      "City": "Kirkland",
      "Province": "",
      "Country": "United States",
      "PostalCode": 98034,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(213) 400-6818",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Every other week schedule, maintenance price $40.",
      "lat": 47.705456,
      "lng": -122.18815
   },
   {
      "Organization": "Susan Webber",
      "FirstName": "Susan",
      "LastName": "Webber",
      "Email": "Robert.webber@construx.com",
      "Street": "4513 191st Pl NE",
      "Street2": "",
      "City": "Sammamish",
      "Province": "",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(425) 999-9214",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Every week schedule, maintenance $65",
      "lat": 47.649902,
      "lng": -122.08383
   },
   {
      "Organization": "Brian Clarkson",
      "FirstName": "Brian",
      "LastName": "Clarkson",
      "Email": "Brian@dnkholdings.net",
      "Street": "7630 Latona Ave NE",
      "Street2": "",
      "City": "Seattle",
      "Province": "",
      "Country": "United States",
      "PostalCode": 98115,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(206) 930-6676",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Every other week schedule, $45 price each",
      "lat": 47.68438,
      "lng": -122.325584
   },
   {
      "Organization": "Somesh Chandra",
      "FirstName": "Somesh",
      "LastName": "Chandra",
      "Email": "Chandra.somesh@gmail.com",
      "Street": "2609 168th Pl NE",
      "Street2": "",
      "City": "Bellevue",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98008,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "(425) 503-2029",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70",
      "lat": 47.633427,
      "lng": -122.11639
   },
   {
      "Organization": "Zohar Raz",
      "FirstName": "Zohar",
      "LastName": "Raz",
      "Email": "razsharon.raz@gmail.com",
      "Street": "6403 151st Ave NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "WA",
      "Country": "United States",
      "PostalCode": 98052,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "+1 (425) 533-7566",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70",
      "lat": 47.66382,
      "lng": -122.13936
   },
   {
      "Organization": "Manash Majhi",
      "FirstName": "Manash",
      "LastName": "Majhi",
      "Email": "manash.majhi@yahoo.com",
      "Street": "8511 230th Way NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4257613086,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $40",
      "lat": 47.678593,
      "lng": -122.03214
   },
   {
      "Organization": "Tarif Mohaisen",
      "FirstName": "Tarif",
      "LastName": "Mohaisen",
      "Email": "tarifm@hotmail.com",
      "Street": "8514 229th Dr NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4258901551,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $25",
      "lat": 47.678486,
      "lng": -122.03378
   },
   {
      "Organization": "Angela Bilkhu",
      "FirstName": "Angela",
      "LastName": "Bilkhu",
      "Email": "angela_bilkhu@yahoo.com",
      "Street": "22823 36th Dr SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.79044,
      "lng": -122.18409
   },
   {
      "Organization": "Tennile Baileykaze",
      "FirstName": "Tennile",
      "LastName": "Baileykaze",
      "Email": "tk22med@hotmail.com",
      "Street": "8516 5th Ave NE",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98115,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2067180053,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45",
      "lat": 47.690945,
      "lng": -122.32268
   },
   {
      "Organization": "Courtney Koski",
      "FirstName": "Courtney",
      "LastName": "Koski",
      "Email": "courtneykoski1@gmail.com",
      "Street": "1205 169th Ave NE",
      "Street2": "",
      "City": "Bellevue",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98008,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4259417051,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $65",
      "lat": 47.620266,
      "lng": -122.115654
   },
   {
      "Organization": "Chris Schetcle",
      "FirstName": "Chris",
      "LastName": "Schetcle",
      "Email": "brightwyrm@gmail.com",
      "Street": "13325 85th Ave NE",
      "Street2": "",
      "City": "Kirkland",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98034,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4259222056,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $80",
      "lat": 47.721066,
      "lng": -122.22892
   },
   {
      "Organization": "Prashant Jaswal",
      "FirstName": "Prashant",
      "LastName": "Jaswal",
      "Email": "prashant_jaswal@yahoo.com",
      "Street": "22910 36th Dr SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4256988799,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.789936,
      "lng": -122.184586
   },
   {
      "Organization": "Lori Martin",
      "FirstName": "Lori Martin",
      "LastName": "",
      "Email": "lori.anne.o@gmail.com",
      "Street": "13028 NE 100th St",
      "Street2": "",
      "City": "Kirkland",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98033,
      "BusPhone": "",
      "HomePhone": 8435662941,
      "MobPhone": 8439066036,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $65",
      "lat": 47.68972,
      "lng": -122.16672
   },
   {
      "Organization": "Sumesh Sharma",
      "FirstName": "Sumesh",
      "LastName": "Dutt Sharma",
      "Email": "sdsthebest@gmail.com",
      "Street": "12827 NE 110th Ct",
      "Street2": "",
      "City": "Kirkland",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98033,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4256158376,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45",
      "lat": 47.698807,
      "lng": -122.168594
   },
   {
      "Organization": "Cynthia Ghaffari",
      "FirstName": "Cynthia",
      "LastName": "Ghaffari",
      "Email": "cynthia9sea@gmail.com",
      "Street": "807 N 50th St",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98103,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 9143563327,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $40",
      "lat": 47.66479,
      "lng": -122.348145
   },
   {
      "Organization": "Courtney Mcfarlane",
      "FirstName": "Courtney",
      "LastName": "Mcfarlane",
      "Email": "court1122@mac.com",
      "Street": "2142 N 128th St",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98133,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2067140911,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $80",
      "lat": 47.72224,
      "lng": -122.33232
   },
   {
      "Organization": "Ellie Bly",
      "FirstName": "Ellie",
      "LastName": "Bly",
      "Email": "eleanorbly@gmail.com",
      "Street": "14015 36th Ave NE",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98125,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 8472248834,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45",
      "lat": 47.73059,
      "lng": -122.29007,
      "passme": true  
   },
   {
      "Organization": "Anna Nekrich",
      "FirstName": "Anna",
      "LastName": "Nekrich",
      "Email": "roninana1@yahoo.com",
      "Street": "17624 NE 30th Pl",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98052,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4255030048,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $50",
      "lat": 47.63732,
      "lng": -122.10435
   },
   {
      "Organization": "Habtamu Feyessa",
      "FirstName": "Habtamu",
      "LastName": "Feyessa",
      "Email": "habtamu@gmail.com",
      "Street": "19412 109th Ct NE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98011,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4254082128,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70",
      "lat": 47.768105,
      "lng": -122.195145
   },
   {
      "Organization": "Becky Rusnak",
      "FirstName": "Becky",
      "LastName": "Rusnak",
      "Email": "beckyrusnak@gmail.com",
      "Street": "11531 31st Ave NE",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98125,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2063912420,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $55",
      "lat": 47.712994,
      "lng": -122.29532
   },
   {
      "Organization": "Robert Yuen",
      "FirstName": "Robert",
      "LastName": "Yuen",
      "Email": "bobbyyuen@gmail.com",
      "Street": "334 N 76th St",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98103,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2063210647,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $45",
      "lat": 47.684242,
      "lng": -122.35369
   },
   {
      "Organization": "Janis Ward",
      "FirstName": "Janis",
      "LastName": "Ward",
      "Email": "gigas@zipcon.net",
      "Street": "7703 19th Ave NW",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98117,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price(mow lawn) $40",
      "lat": 47.68517,
      "lng": -122.3814
   },
   {
      "Organization": "Kapil Dua",
      "FirstName": "Kapil",
      "LastName": "Dua",
      "Email": "dua.kapil@yahoo.com",
      "Street": "22904 36th Dr SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4256476844,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "",
      "lat": 47.790073,
      "lng": -122.184586
   },
   {
      "Organization": "Vijendhar Reddy Vontela",
      "FirstName": "Vijendhar Reddy",
      "LastName": "Vontela",
      "Email": "Vontelav@gmail.com",
      "Street": "22933 36th Dr SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "",
      "lat": 47.78934,
      "lng": -122.18401
   },
   {
      "Organization": "Jefferey Lindner",
      "FirstName": "Jefferey",
      "LastName": "Lindner",
      "Email": "j2los@hotmail.com",
      "Street": "12505 20th Ave NE",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98125,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4252810400,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $60",
      "lat": 47.71958,
      "lng": -122.307655
   },
   {
      "Organization": "Traci Lee",
      "FirstName": "Traci",
      "LastName": "Lee",
      "Email": "tlcgirl54@yahoo.com",
      "Street": "21008 NE 44th St",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 8085547145,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70",
      "lat": 47.649113,
      "lng": -122.0594
   },
   {
      "Organization": "Ryan Meyer",
      "FirstName": "Ryan",
      "LastName": "Meyer",
      "Email": "ryancmeyer@hotmail.com",
      "Street": "3611 228th Pl SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2063309440,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.79082,
      "lng": -122.18484
   },
   {
      "Organization": "Maureen Zito",
      "FirstName": "Maureen",
      "LastName": "Zito",
      "Email": "moe-zito@comcast.net",
      "Street": "17639 NE 128th Pl",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98052,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4252236731,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $90",
      "lat": 47.71484,
      "lng": -122.10264
   },
   {
      "Organization": "Vikas Raoot",
      "FirstName": "Vikas",
      "LastName": "Raoot",
      "Email": "vraoot@live.com",
      "Street": "13118 111th Pl NE",
      "Street2": "",
      "City": "Kirkland",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98034,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4254443316,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $40",
      "lat": 47.718132,
      "lng": -122.19191
   },
   {
      "Organization": "Maureen Cheal",
      "FirstName": "Maureen",
      "LastName": "Cheal",
      "Email": "maureen@cheal.com",
      "Street": "12115 SE 27th St",
      "Street2": "",
      "City": "Belleavue",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98005,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4252745222,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $80, mowing the hill back plus $20",
      "lat": 47.585785,
      "lng": -122.17712
   },
   {
      "Organization": "Lili Wang",
      "FirstName": "Lili",
      "LastName": "Wang",
      "Email": "evan@nareigus.com",
      "Street": "14708 NE 15th Court",
      "Street2": "",
      "City": "Bellevue",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98007,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "206-660-2977",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "First mowing was $100 but the maintenance mowing $70",
      "lat": 47.6229,
      "lng": -122.14476
   },
   {
      "Organization": "Guocheng Lu",
      "FirstName": "Guocheng",
      "LastName": "Lu",
      "Email": "2421417215@qq.com",
      "Street": "1132 268th Way SE",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98075,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "206-660-2977",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Mowing price $65",
      "lat": 47.599133,
      "lng": -121.98237
   },
   {
      "Organization": "Chad Lennox",
      "FirstName": "Chad",
      "LastName": "Lennox",
      "Email": "wclennox3@msn.com",
      "Street": "7608 Linden Ave N",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98103,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2022552203,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "maintenance price $40",
      "lat": 47.68431,
      "lng": -122.34698
   },
   {
      "Organization": "Keith Ragusa",
      "FirstName": "Keith",
      "LastName": "Ragusa",
      "Email": "keith_ragusa@hotmail.com",
      "Street": "12853 NE 106th Pl",
      "Street2": "",
      "City": "Kirkland",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98033,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2069540519,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $35",
      "lat": 47.694927,
      "lng": -122.167984
   },
   {
      "Organization": "Theresa Mayo",
      "FirstName": "Theresa",
      "LastName": "Mayo",
      "Email": "Bodhii@hotmail.com",
      "Street": "3910 NE 127th St",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98125,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70",
      "lat": 47.721115,
      "lng": -122.28572
   },
   {
      "Organization": "Waterstone Flats Condominium Association",
      "FirstName": "",
      "LastName": "",
      "Email": "bookkeeping.aycpa@gmail.com",
      "Street": "10931 124th Ave NE",
      "Street2": "",
      "City": "Kirkland",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98033,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $60",
      "lat": 47.698701,
      "lng": -122.176113
   },
   {
      "Organization": "Abhishek Fnu",
      "FirstName": "Abhishek",
      "LastName": "Fnu",
      "Email": "abojha3@gmail.com",
      "Street": "9547 225th Way NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2062187707,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $25, in an every other week schedule.",
      "lat": 47.685726,
      "lng": -122.04175
   },
   {
      "Organization": "Kristi Schultz",
      "FirstName": "Kristi",
      "LastName": "Schultz",
      "Email": "rc_properties@hotmail.com",
      "Street": "2518 NE 195th St",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98155,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 5417888332,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $150",
      "lat": 47.770454,
      "lng": -122.3023
   },
   {
      "Organization": "Jeane Kumar",
      "FirstName": "Jeane",
      "LastName": "Kumar",
      "Email": "jeana@doorstop.net",
      "Street": "2816 Harvard Ave E",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98102,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 9177272765,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $50",
      "lat": 47.646194,
      "lng": -122.32173
   },
   {
      "Organization": "Anfaneya Telikutla",
      "FirstName": "Anfaneya",
      "LastName": "Telikutla",
      "Email": "anjaneya_r@yahoo.com",
      "Street": "22831 36th Dr SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4257853703,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.7903,
      "lng": -122.18406
   },
   {
      "Organization": "Hung I Wu",
      "FirstName": "Wu",
      "LastName": "Hung",
      "Email": "giyaq1688hungi@gmail.com",
      "Street": "22817 36th Dr SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.790573,
      "lng": -122.18411
   },
   {
      "Organization": "Jyotsna Natarajan",
      "FirstName": "Jyotsna",
      "LastName": "Natarajan",
      "Email": "jyotsna_n@hotmail.com",
      "Street": "1210 19th Ave E",
      "Street2": "",
      "City": "Seattle",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98112,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2064415016,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $35",
      "lat": 47.63097,
      "lng": -122.306854
   },
   {
      "Organization": "Hui Dai",
      "FirstName": "Hui",
      "LastName": "Dai",
      "Email": "huidai.ustc@gmail.com",
      "Street": "230 105th Ave SE",
      "Street2": "",
      "City": "Bellevue",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98004,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4253068691,
      "Fax": "",
      "SecStreet": "230 105th Ave SE",
      "SecStreet2": "",
      "SecCity": "Bellevue",
      "SecProvince": "Washington",
      "SecCountry": "United States",
      "SecPostalCode": 98004,
      "Notes": "Maintenance price $60",
      "lat": 47.608099,
      "lng": -122.199835 
   },
   {
      "Organization": "Paulette Henderson",
      "FirstName": "Paulette",
      "LastName": "Henderson",
      "Email": "pauletteh@live.com",
      "Street": "3424 214th Pl SE",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98075,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4252957676,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $70",
      "lat": 47.57805,
      "lng": -122.0532
   },
   {
      "Organization": "Larisa Pairault",
      "FirstName": "Larisa",
      "LastName": "Pairault",
      "Email": "larissal8@hotmail.com",
      "Street": "23811 NE 75th St",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $40",
      "lat": 47.67114,
      "lng": -122.02131
   },
   {
      "Organization": "Kapil Arora",
      "FirstName": "Kapil",
      "LastName": "Arora",
      "Email": "kapilarora7@hotmail.com",
      "Street": "8720 228th Way NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance Price $25",
      "lat": 47.67993,
      "lng": -122.03429
   },
   {
      "Organization": "Aziz El Ouaqid",
      "FirstName": "Aziz",
      "LastName": "El Ouaqid",
      "Email": "azizelo@outlook.com",
      "Street": "23976 NE 102nd Pl",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $25",
      "lat": 47.689182,
      "lng": -122.019714
   },
   {
      "Organization": "Saurabh Boyed",
      "FirstName": "Sneha",
      "LastName": "Boyed",
      "Email": "sboyed@gmail.com",
      "Street": "23002 36th Ave SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.789238,
      "lng": -122.185524
   },
   {
      "Organization": "Alex Pena",
      "FirstName": "Alex",
      "LastName": "Pena",
      "Email": "alexs.pena@gmail.com",
      "Street": "3617 228th Pl SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.79082,
      "lng": -122.18462
   },
   {
      "Organization": "Naveen Advanapu",
      "FirstName": "Naveen",
      "LastName": "Advanapu",
      "Email": "naveen.sai@gmail.com",
      "Street": "3629 228th Pl SE",
      "Street2": "",
      "City": "Bothell",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98021,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.790833,
      "lng": -122.18417
   },
   {
      "Organization": "Vidhya Pallayil",
      "FirstName": "Vidhya",
      "LastName": "Pallayil",
      "Email": "vidhya_kp@yahoo.com",
      "Street": "22566 NE 99th Way",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.687542,
      "lng": -122.038635
   },
   {
      "Organization": "Remi Pairault",
      "FirstName": "Remy",
      "LastName": "Pairault",
      "Email": "remy_pairault@hotmail.com",
      "Street": "22542 NE 91st Way",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $20",
      "lat": 47.682163,
      "lng": -122.03855
   },
   {
      "Organization": "Vijay Baliga",
      "FirstName": "Vijay",
      "LastName": "Baliga",
      "Email": "vijaybaliga@outlook.com",
      "Street": "23981 NE 102nd Pl",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $35",
      "lat": 47.68885,
      "lng": -122.01917
   },
   {
      "Organization": "Amit Fnu",
      "FirstName": "Amit",
      "LastName": "Fnu",
      "Email": "amit.shelley@gmail.com",
      "Street": "10833 Muirwood Way NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "",
      "lat": 47.695026,
      "lng": -122.02346
   },
   {
      "Organization": "Nikhil Sarnot",
      "FirstName": "Nikhil",
      "LastName": "Sarnot",
      "Email": "nsarnot@hotmail.com",
      "Street": "21815 NE 30th Pl",
      "Street2": "",
      "City": "Sammamish",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98074,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4256330788,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $50",
      "lat": 47.638645,
      "lng": -122.05025
   },
   {
      "Organization": "Erin Quinn",
      "FirstName": "Erin",
      "LastName": "Quinn",
      "Email": "erinmquinn@yahoo.com",
      "Street": "7604 245th Way NE",
      "Street2": "",
      "City": "Redmond",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98053,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": "",
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $55 weekly",
      "lat": 47.67224,
      "lng": -122.01138
   },
   {
      "Organization": "Matthew Hodson",
      "FirstName": "Matthew",
      "LastName": "Hodson",
      "Email": "machrisod@gmail.com",
      "Street": "1535 NE 168th St",
      "Street2": "",
      "City": "Shoreline",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98155,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 2064374656,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "$65 maintenance rate",
      "lat": 47.749992,
      "lng": -122.31169
   },
   {
      "Organization": "Justin Voss",
      "FirstName": "Justin",
      "LastName": "Voss",
      "Email": "voss@uw.edu",
      "Street": "16767 39th Ave NE",
      "Street2": "",
      "City": "Lake Forest Park",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98155,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 9079520630,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "maintenace price $65",
      "lat": 47.751152,
      "lng": -122.283676
   },
   {
      "Organization": "Olivier Matrat",
      "FirstName": "Olivier",
      "LastName": "Matrat",
      "Email": "olivier_matrat@hotmail.com",
      "Street": "17120 SE 48th Ct",
      "Street2": "",
      "City": "Bellevue",
      "Province": "Washington",
      "Country": "United States",
      "PostalCode": 98006,
      "BusPhone": "",
      "HomePhone": "",
      "MobPhone": 4256149344,
      "Fax": "",
      "SecStreet": "",
      "SecStreet2": "",
      "SecCity": "",
      "SecProvince": "",
      "SecCountry": "",
      "SecPostalCode": "",
      "Notes": "Maintenance price $55",
      "lat": 47.559921,
      "lng": -122.114657
   }
];
    </script>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <form action="" method="POST" class="form-horizontal col-md-7">
                  
                  <div class="form-group col-md-12">
                      <label class="form-label">Organization Name</label>
                      <input class="form-control" name="Organization">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">First Name 200</label>
                      <input class="form-control" name="FirstName">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">Last Name</label>
                      <input class="form-control" name="LastName">
                  </div>
                  
                  <div class="form-group col-md-12">
                      <label class="form-label">Email</label>
                      <input class="form-control" name="Email">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">Street</label>
                      <input class="form-control" name="Street" placeholder="8002 Wallingford Ave N">
                  </div>
                        <div class="form-group col-md-6" style="visibility : hidden;">
                            <label class="form-label">Street2</label>
                            <input class="form-control" name="Street2">
                        </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">City</label>
                      <input class="form-control" name="City">
                  </div>
                  <div class="form-group col-md-3">
                      <label class="form-label">Province</label>
                      <input class="form-control" name="Province">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">Country</label>
                      <input class="form-control" name="Country">
                  </div>
                  <div class="form-group col-md-3">
                      <label class="form-label">Postal Code</label>
                      <input class="form-control" name="PostalCode">
                  </div>
                  <div class="form-group col-md-3">
                      <label class="form-label">Business Phone</label>
                      <input class="form-control" name="BusPhone">
                  </div>
                  <div class="form-group col-md-3">
                      <label class="form-label">Home Phone</label>
                      <input class="form-control" name="HomePhone">
                  </div>
                  <div class="form-group col-md-3">
                      <label class="form-label">Mobile Phone</label>
                      <input class="form-control" name="MobPhone">
                  </div>
                  <div class="form-group col-md-6" style="visibility : hidden;">
                      <label class="form-label">Fax</label>
                      <input class="form-control" name="Fax">
                  </div>
                  <div class="form-group col-md-12">
                      <label class="form-label"></label>
                      <input class="form-control" name="">
                  </div>
                  
                  

                    <div style="display : none;" class="Sec">
                        <div class="form-group col-md-6">
                            <label class="form-label">Second Street</label>
                            <input class="form-control" name="SecStreet" placeholder="8002 Wallingford Ave N">
                        </div>
                              <div class="form-group col-md-6" style="visibility : hidden;">
                                  <label class="form-label">Second Street2</label>
                                  <input class="form-control" name="SecStreet2">
                              </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Second City</label>
                            <input class="form-control" name="SecCity">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Second Province</label>
                            <input class="form-control" name="SecProvince">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Second Country</label>
                            <input class="form-control" name="SecCountry">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Second Postal Code</label>
                            <input class="form-control" name="SecPostalCode">
                        </div>
                    </div>
      
                  
                  
                  <div class="form-group col-md-12">
                      <label class="form-label">Notes</label>
                      <input class="form-control" name="Notes" placeholder="Maintenance price $60, in an every other week schedule.">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">Latitude</label>
                      <input class="form-control" name="lat">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">Longitude</label>
                      <input class="form-control" name="lng">
                  </div>
              </form>
          </div>
      </div>  
    <div id="map"></div>
    <script>
             
        localStorage.removeItem("Clients_list");
             
             var itIsNew = "It is really new";
             
    var object = {value: __CLIENTS_FULL_LIST__, timestamp: Date.now()};
        
        localStorage.setItem("clients_list", JSON.stringify(object));


    //var object = JSON.parse(localStorage.getItem("key")),
        //dateString = object.timestamp,
        //now = new Date().getTime().toString();

        //compareTime(dateString, now); //to implement



         //localStorage.setObject("lucas", __CLIENTS_FULL_LIST__);
                
        var _i_ = 0;
        
        var _last_index_ = __CLIENTS_FULL_LIST__.length - 1;
  
//        returnLatLng(__CLIENTS_FULL_LIST__[_i_].Street+" "+__CLIENTS_FULL_LIST__[_i_].City+", "+isItWashington(__CLIENTS_FULL_LIST__[_i_].Province)+" "+__CLIENTS_FULL_LIST__[_i_].PostalCode, _i_);
                
        
        function isItWashington(_string_){
            
            return _string_.trim() === "Washington" ? "WA" : _string_.trim();
        } 

        function returnLatLng(business_address, _count_, _clients_full_list_){
            // if the array ended this function will no be execute
            if(_count_ >= _last_index_){
  
                //console.log(JSON.stringify(__CLIENTS_FULL_LIST__));
  
                return false;
            } 
        
            $.ajax({

                url : 'http://maps.googleapis.com/maps/api/geocode/json?&sensor=false',
                data : {
                    'address' : business_address
                }
            })
            .done(function(done){

                var response = done.results[done.results.length - 1];
                    
                    if(response === undefined || response === null){
                        setTimeout(function(){
                            
                            returnLatLng(__CLIENTS_FULL_LIST__[_count_].Street+" "+__CLIENTS_FULL_LIST__[_count_].City+", "+isItWashington(_clients_full_list_[_count_].Province)+" "+__CLIENTS_FULL_LIST__[_count_].PostalCode, _count_);
                        }, 1000);
                    }else{
                    
                    var lat = response.geometry.location.lat;
                    var lng = response.geometry.location.lng;
                    business_address = response.formatted_address.replace( ', USA', '' );
                    
                    __CLIENTS_FULL_LIST__[_count_].lat = lat;
                    __CLIENTS_FULL_LIST__[_count_].lng = lng;
                                                        
                    if(_count_ < _last_index_){
                        _count_++;
                        
                        returnLatLng(__CLIENTS_FULL_LIST__[_count_].Street+" "+__CLIENTS_FULL_LIST__[_count_].City+", "+isItWashington(__CLIENTS_FULL_LIST__[_count_].Province)+" "+__CLIENTS_FULL_LIST__[_count_].PostalCode, _count_);
                    }
                }
               
            })
            .fail(function(fail){

                console.log("fail");
                console.log( fail );
                return false;
            });
        }
        
        function initMap(){

           

            var location = __CLIENTS_FULL_LIST__;
            
            var bounds = new google.maps.LatLngBounds();
            
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < location.length; i++) {  
                
                if(!location[i].passme){
                        
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(location[i].lat, location[i].lng),
                            map: map
                        });

                    var myLatLng = new google.maps.LatLng(location[i].lat, location[i].lng);

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(location[i].Organization);
                            infowindow.open(map, marker);
                        };
                    })(marker, i));

                    bounds.extend(myLatLng);
                }
            }
            
            map.fitBounds(bounds);
        }
    </script>
   
  </body>
</html>