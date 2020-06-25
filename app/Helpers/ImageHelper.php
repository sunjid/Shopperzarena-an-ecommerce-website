<?php
namespace App\Helpers;
/**
* Image Helper
*/
use App\Models\User;
use App\Helpers\GravatarHelper;

class ImageHelper
{
    public static function getUserImage($id)
    {
    $user = User::find($id);
    $avatar_url = "";
    if (!is_null($user)) {
      if ($user->avatar == NULL) {
        // Return him Gravatar ImageHelper
        if(GravatarHelper::validate_gravatar($user->email))
        {
          $avatar_url = GravatarHelper::gravatar_image($user->email, 100);
        }else {
          // Whern there is no gravatar
          $avatar_url = url('images/defaults/user.png');
        }
      }else {
        // Return that image
        $avatar_url = url('images/users/'. $user->avatar);
      }
    }
    else {
      // code...
    }
    return $avatar_url;
  }
}
