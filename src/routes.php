<?php

Route::get('/civics/shuffle', function () {
    \Session::remove('qArray');
    return redirect()->route('question.show');
});

Route::get('/civics/{id?}', array('as' => 'question.show', 'uses' => 'mnshankar\civics\QuestionController@show'));
Route::post('/civics/{id}/update', array('as' => 'question.update', 'uses' => 'mnshankar\civics\QuestionController@update'));

