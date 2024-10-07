<?php

namespace App\Controllers;


use App\Models\ReviewModel;
use App\Models\UserWatchlistModel;

class MovieController extends BaseController
{

    public function index()
    {
        helper('tmdb_helper');
        $movies = get_tmdb_movies('popular', 1);

        return view('movies/homepage', [
            'movies' => $movies['results'],
        ]);
    }


    public function addReview()
    {
        $reviewModel = new ReviewModel();

        $data = [
            'user_id' => session()->get('user_id'),
            'tmdb_id' => $this->request->getPost('tmdb_id'),
            'rating' => $this->request->getPost('rating'),
            'review_text' => $this->request->getPost('review_text')
        ];

        $reviewModel->insert($data);
        return redirect()->to('/movies');
    }

    public function addToWatchlist()
    {
        $watchlistModel = new UserWatchlistModel();

        $data = [
            'user_id' => session()->get('user_id'),
            'tmdb_id' => $this->request->getPost('tmdb_id')
        ];

        $watchlistModel->insert($data);
        return redirect()->to('/movies');
    }
}
