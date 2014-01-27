function link_to_route_image($route, $image)
{
   $m = '<a href="'.URL::to_route($route).'">'
      . '<img>'.$image.'</img>'
      . '</a>';
   return $m;
}