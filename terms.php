<?php
include 'dbreq.php';
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();
    include 'intro.php';
    include 'menu.php';
    ?>
    <h1>Terms and usages</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a varius orci, vel feugiat purus. Duis placerat vulputate dolor laoreet lacinia. Pellentesque a orci nec purus porttitor commodo. Aliquam id neque euismod, congue mauris ac, congue felis. Cras vel mi sollicitudin, consectetur felis et, euismod arcu. 
    Nulla malesuada arcu vel nisl condimentum malesuada. Nulla vulputate ante condimentum magna volutpat, ac blandit lorem tempus. Praesent molestie augue nec felis ullamcorper, ac euismod augue pretium. Morbi nibh elit, bibendum eget maximus eu, feugiat a leo. Duis sit amet ex quis tellus aliquet viverra.</p>
    <p>Morbi sed magna aliquet, viverra mi in, rutrum justo. Quisque tristique quis nulla vel elementum. Suspendisse sit amet ante vestibulum, feugiat nisi id, sollicitudin neque. Fusce dolor magna, aliquam at mauris in, venenatis convallis erat. Morbi at lorem porta, placerat ipsum sed, consectetur sapien. Fusce ut mollis ex. Aenean fermentum consequat tortor id ornare. 
    Donec imperdiet facilisis tortor vitae molestie. Phasellus blandit arcu ac leo molestie mollis. Maecenas accumsan tortor odio, in facilisis ex bibendum at.</p>
    <p>Morbi nec pretium ex. Sed at rhoncus felis, vitae convallis tellus. Curabitur vitae lacus justo. Aliquam et venenatis arcu. Phasellus sit amet nibh cursus magna auctor placerat. 
    Sed egestas, augue sed pharetra tincidunt, justo diam varius nisl, ut imperdiet urna elit vitae mauris. Donec sollicitudin ultrices sapien vitae congue. Morbi scelerisque volutpat mauris sed imperdiet. Duis leo purus, vehicula vitae lacus id, placerat iaculis leo. In hac habitasse platea dictumst.</p>
    <p>Nullam ac pellentesque lorem. In hac habitasse platea dictumst. Donec a turpis sed enim facilisis ultricies. Maecenas euismod augue ut finibus sodales. In sed ex at lacus interdum viverra vel a lacus. Pellentesque fermentum lacinia nisi non congue. Sed scelerisque enim non mollis convallis. Sed aliquam at nulla eget malesuada. 
    Suspendisse ut hendrerit leo. Maecenas ultricies mi tempus, malesuada velit ac, maximus purus. Nam mauris leo, mattis at faucibus sit amet, varius facilisis tellus. Etiam tristique metus sit amet erat iaculis tempus. Suspendisse ut finibus sapien, a porta risus.</p>
    <p>Sed ullamcorper enim sed ligula auctor rutrum et non leo. Nullam et aliquet ligula. Sed elit mauris, tempor eu quam quis, scelerisque rhoncus arcu. Donec ut enim et ipsum rhoncus facilisis ut non est. Proin id tristique orci, quis malesuada tellus. Maecenas consequat leo ac condimentum lacinia. Ut id vehicula augue. Vestibulum nec cursus lacus, ut viverra urna. Ut consequat augue non sagittis iaculis. 
    Donec dapibus dapibus nibh, vel pretium velit malesuada molestie. Praesent ut urna sagittis, ornare elit vel, ullamcorper arcu. Curabitur sollicitudin mattis libero et pharetra. Mauris sit amet consequat ante, vitae congue augue. Phasellus porttitor ac risus vel rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget ipsum dolor.</p>
    <?php
    include 'outro.php';
?>

