<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\User;
use Modules\Edu\Entities\Video;
use Modules\Edu\Transformers\Front\VideoResource;

class VideoController extends ApiController
{
  public function index()
  {
  }
  public function create()
  {
    return view('edu::create');
  }
  public function store(Request $request)
  {
  }
  public function show(Video $video)
  {
    return $this->json(new VideoResource($video));
  }

  /**
   * 点赞
   * @param Video $video
   * @return JsonResponse
   */
  public function favour(Video $video)
  {
    $user = User::instance(Auth::user());
    $user->videoFavour()->toggle([$video['id']]);
    $video['favour_count'] =  $video->favour->count();
    $video->save();
    return $this->json(new VideoResource($video));
  }

  /**
   * 收藏
   * @param Video $video
   * @return JsonResponse
   */
  public function favorite(Video $video)
  {
    $user =  User::instance(Auth::user());
    $user->videFavorite()->toggle([$video['id']]);
    $video['favorite_count'] = $video->favorite->count();
    $video->save();
    return $this->json(new VideoResource($video));
  }
  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
