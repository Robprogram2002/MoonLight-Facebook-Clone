<div class = 'info-view-container'>
    <div class = 'description'>
        <p> "{{$user_info->description}}" </p>
        <span> {{$user_info->nombre}} </span>
    </div>
    <div class = 'first-row'>
        <div class = 'general'> 
            <h2>General Information</h2>
            <div class="container">
                <h4>Complete Name :</h4>
                <p> {{$user_info->nombre}} </p>
    
                <h4>Email :</h4>
                <p> {{$user_info->email}} </p>
    
                <div class="numbers">
                    <div>
                        <h4>Age :</h4>
                        <p> {{$user_info->edad}} </p>
                    </div>
                    <div>
                        <h4 >Born Date :</h4>
                        <p > {{$user_info->born}} </p>
                    </div>
                </div>
    
                <h4>Phone Number :</h4>
                <p> {{$user_info->phone}} </p>
            </div>
        </div>
        <div class = 'formation'>
            <h2>Formation & Employe</h2>
            <div class="container">
                <h4>Job/Employe :</h4>
                <p> {{$user_info->trabajo}} </p>
    
                <h4>Job place :</h4>
                <p> {{$user_info->work_place}} </p>
    
                <h4>University :</h4>
                <p> {{$user_info->estudios1}} </p>
    
                <h4>High School :</h4>
                <p> {{$user_info->estudios2}} </p>
            </div>
        </div>
    </div>
    <div class = 'about'>
        <h2>About Me</h2>
        <div class="container">
            <div class="living">
                <h4>Origin place :</h4>
                <p> {{$user_info->procedencia}} </p>

                <h4>Current Living Place :</h4>
                <p> {{$user_info->residencia}} </p>
            </div>

            <h4>My hobbies :</h4>
            <div class="hobbie">
                <p> {{$user_info->hobbie1}} </p>
                <p> {{$user_info->hobbie2}} </p>
                <p> {{$user_info->hobbie3}} </p>
            </div>
            <h4>My skills :</h4>
            <div class="skill">
                <p> {{$user_info->hobbie4}} </p>
                <p> {{$user_info->hobbie5}} </p>
                <p> {{$user_info->hobbie6}} </p>
            </div>

            <h4>Relation status :</h4>
            <p> {{$user_info->status}} </p>
        </div>
    </div>
    <div  class = 'other'>
        <div class="container">
            <h2>My Important events</h2>
            <p> {{$user_info->curiosidad1}} </p>
            <p> {{$user_info->curiosidad2}} </p>
            <p> {{$user_info->curiosidad3}} </p>
        </div>
    </div>
</div>
