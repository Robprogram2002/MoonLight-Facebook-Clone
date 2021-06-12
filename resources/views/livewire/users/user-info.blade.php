<div>
    <div class="information">
        <h3>We don't know nothing about you! </h3>
        <a href="#" wire:click.prevent = "showInfoForm">Add Information</a>
    </div>

    @if($show === 'verdadero')     
        <div class="form-info-container">
            <div class="container">
                <div class="header">
                    <h3><i class="fas fa-user"></i> Information {{$show}} </h3>
                    <i class="far fa-times-circle" wire:click.prevent = "showInfoForm"></i>
                </div>
                <div class="main">
                    <div class="menu-toggle">
                        <button wire:click.prevent = "updateAction('general')">General Info</button>
                        <button  wire:click.prevent = "updateAction('formation')">Formation and Enployment</button>
                        <button  wire:click.prevent = "updateAction('living')">Living Place</button>
                        <button  wire:click.prevent = "updateAction('about')">Information about you</button>
                        <button wire:click.prevent = "updateAction('other')">Others</button>
                    </div>
                    <form wire:submit.prevent = "saveInfo">
                        @csrf
                        @switch($action)
                            @case($action == 'general')
                                <div>
                                    <label for="nombre">Complete Name </label>
                                    <input type="text" wire:model = "nombre" id="nombre">
                                    @error('nombre') <span class="error"> {{$message}} </span> @enderror

                                    <div class="date">
                                        <div>
                                            <label for="edad">Age </label>
                                            <input type="number" step="1" wire:model = "age" id="edad">
                                            @error('age') <span class="error"> {{$message}} </span> @enderror
                                        </div>
                                        <div>
                                            <label for="born">Born Date </label>
                                            <input type="date" wire:model = "born" id="born">
                                            @error('born') <span class="error"> {{$message}} </span> @enderror
                                        </div>
                                    </div>

                                    <label for="email">Email </label>
                                    <input type="email" wire:model = "email" id="email">
                                    @error('email') <span class="error"> {{$message}} </span> @enderror

                                    <label for="phone">Phone number </label>
                                    <input type="tel" wire:model = "phone" id="phone">
                                    @error('phone') <span class="error"> {{$message}} </span> @enderror

                                </div>
                                @break
                            @case($action == 'formation')
                                <div>
                                    <label for="employe">Employe:</label>
                                    <input type="text" wire:model = "employe" id="employe" placeholder="company - puesto ....">
                                    @error('employe') <span class="error"> {{$message}} </span> @enderror
                                
                                    <label for="work_place">Work place:</label>
                                    <input type="text" wire:model = "work_place" id="work_place" placeholder="country - city - town">
                                    @error('work_place') <span class="error"> {{$message}} </span> @enderror
                                
                                    <label for="university">University:</label>
                                    <input type="text" wire:model = "university" id="university" placeholder="university - degree - start/end ">
                                    @error('university') <span class="error"> {{$message}} </span> @enderror
                                
                                    <label for="school">High school:</label>
                                    <input type="text" wire:model = "school" id="school" placeholder="school - grade - start/end -specialization">
                                    @error('school') <span class="error"> {{$message}} </span> @enderror
                                </div>
                                @break
                            @case($action == 'living')
                                <div>
                                    <label for="origin">Origin place:</label>
                                    <input type="text" wire:model = "origin" id="origin" placeholder="country - city - town">
                                    @error('origin') <span class="error"> {{$message}} </span> @enderror
                                
                                    <label for="living">Current place:</label>
                                    <input type="text" wire:model = "living" id="living" placeholder="country - city - town">
                                    @error('living') <span class="error"> {{$message}} </span> @enderror
                                </div>
                                @break
                            @case($action == 'about')
                                <div>
                                    <label for="description">Descipte yourself:</label>
                                    <textarea wire:model = "description" id="description" ></textarea>
                                    @error('description') <span class="error"> {{$message}} </span> @enderror

                                    <label>Add your hobbies</label>
                                    <div class="hobbies">
                                        <input type="text" wire:model = "hobbieOne" placeholder="hobbie one">
                                        @error('hobbieOne') <span class="error"> {{$message}} </span> @enderror
                                        <input type="text" wire:model = "hobbieTwo" placeholder="hobbie two">
                                        @error('hobbieTwo') <span class="error"> {{$message}} </span> @enderror
                                        <input type="text" wire:model = "hobbieThree" placeholder="hobbiew three">
                                        @error('hobbieThree') <span class="error"> {{$message}} </span> @enderror
                                    </div>

                                    <label>Add your Skills/Abilities</label>
                                    <div class="skills">
                                        <input type="text" wire:model = "skillOne" placeholder="skill one">
                                        @error('skillOne') <span class="error"> {{$message}} </span> @enderror
                                        <input type="text" wire:model = "skillTwo" placeholder="skill twp">
                                        @error('skillTwo') <span class="error"> {{$message}} </span> @enderror
                                        <input type="text" wire:model = "skillThree" placeholder="skill three">
                                        @error('skillThree') <span class="error"> {{$message}} </span> @enderror
                                    </div>
                                    <label for="status">Your status:</label>
                                    <input type="text" wire:model = "status" id="status" placeholder="single - married/meeting with ...">
                                    @error('status') <span class="error"> {{$message}} </span> @enderror
                                
                                </div>
                                @break
                            @case($action == 'other')
                                <div class="other">
                                    <label>Add some important events</label><br>
                                    <input type="text" wire:model = "eventOne"  placeholder="Event one">
                                    @error('eventOne') <span class="error"> {{$message}} </span> @enderror
                                    <br><br>

                                    <input type="text" wire:model = "eventTwo" placeholder="Event one">
                                    @error('eventTwo') <span class="error"> {{$message}} </span> @enderror
                                    <br><br>

                                    <input type="text" wire:model = "eventThree" placeholder="Event one">
                                    @error('eventThree') <span class="error"> {{$message}} </span> @enderror
                                    <br><br>
                                </div>                                      
                                @break
                                @case($action == 'index')
                                    <div></div>
                                @break
                        @endswitch
    
                        <input type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

