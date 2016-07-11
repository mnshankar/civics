<?php namespace mnshankar\civics;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class QuestionController extends BaseController {

    
    //display the form
    private $questionService;
    private $randomizedQuestions;

    /**
     * QuestionController constructor.
     *
     * @param \mnshankar\civics\QuestionService $questionService
     *
     */
    public function __construct(QuestionService $questionService)
    {
        if (!(\Session::has('qArray'))){
            \Session::put('qArray', $questionService->all());
        }
        $this->randomizedQuestions = \Session::get('qArray');

        $this->questionService = $questionService;
    }

    public function show($id=null)
    {
        if ($id===null){
            $id = $this->randomizedQuestions[0];
        }
        $row = Question::findOrFail($id);
        return view('civics::display',['row'=>$row, 'id'=>$id]);
    }
    //Move to Next (or prev) Question
    public function update($id, Request $request)
    {
        $civics_message = null;
        if ($request->input('btn')=='next') {   //next button pressed
            $nextId= $this->questionService->getNext($this->randomizedQuestions, $id);
        }
        else    //previous button pressed
        {
            $nextId = $this->questionService->getPrevious($this->randomizedQuestions, $id);
        }
        if ($nextId==$id){
            $civics_message='All Questions Complete!';
        }
        return redirect()->route('question.show',array('id'=>$nextId))
            ->with('civics_message',$civics_message);
    }
}
