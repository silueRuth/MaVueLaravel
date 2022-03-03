<form method="POST" action="{{route('store')}}">
    @csrf
        <fieldset>
            <legend>Créer un contrat</legend>
            
                <label>Nom de l'employé : </label> 
                    <select name="employe" > 
                    <option value="" selected="selected" disabled>Ex: Foursov Mycky</option> 
                        @foreach($emp as $emps)
                        <option value="{{$emps->id}}" > 
                            {{$emps->nom}} {{$emps->prenom}}
                        </option> 
                        @endforeach
                    </select>    
                
                <label>Poste de l'employé : </label> 
                    <select name="poste" >
                    <option value="" selected="selected" disabled >Ex: Agent commercial</option>    
                        @foreach($post as $posts)
                        <option value="{{$posts->id}}" > {{$posts->post}}</option> 
                        @endforeach
                    </select>

                <label>Détail du contrat : </label>
                    <input type="text" name="detail" placeholder="Contrat de stage" required/><br>

                <input type="submit" value="Valider"/>

        </fieldset>

    </form>