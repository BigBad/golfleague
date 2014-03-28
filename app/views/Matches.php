<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
<body><div class="container_12">


<div id="scores" class="grid_10 push_1"> 
    <label>Date:</label><br>
    <input class="ui-corner-all" id="date">
    <option></option>
    </input>
   <label>Course:</label><br>
    <select class="ui-corner-all" id="course">
    <option></option>
    </select><br><br>
    <table border="1" id="course_table">
        <tr>
        <td>Hole 1:</td>
        <td>Hole 2:</td>
        <td>Hole 3:</td>
        <td>Hole 4:</td>
        <td>Hole 5:</td>
        <td>Hole 6:</td>
        <td>Hole 7:</td>
        <td>Hole 8:</td>
        <td>Hole 9:</td>
        <td>Total:</td>
        </tr>
        <tr>
        <td id="course_1"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_2"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_3"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_4"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_5"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_6"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_7"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_8"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_9"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_total"><input type="text" style="width:30px" disabled></input></td>        
        </tr>
        <tr>
        <td>Par:</td>
        <td>Par:</td>
        <td>Par:</td>
        <td>Par:</td>
        <td>Par:</td>
        <td>Par:</td>
        <td>Par:</td>
        <td>Par:</td>
        <td>Par:</td>        
        <td>Total:</td>
        </tr>
        <tr>
        <td id="course_1_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_2_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_3_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_4_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_5_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_6_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_7_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_8_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course_9_score"><input type="text" style="width:30px" disabled></input></td>
        <td id="course__score_total"><input type="text" style="width:30px" disabled></input></td>        
        </tr>
        
    </table>
    <br><br>
    
    <label>Team 1</label><br>
    <table border="1">
    <tr>
        <td>      
            <label>Player A:</label><br>
            <select class="ui-corner-all players" id="player_1_team_1">
            <option></option>
            </select>
            <input type="checkbox" id="sub1A" >Sub?</input>            
            <select class="ui-corner-all subs" id="sub_A_team_1" hidden>
            <option></option>
            </select>
            <br>
            <br>
        </td>  
        <td>
            <label>Player B:</label><br>
            <select class="ui-corner-all players" id="player_B_team_1">
            <option></option>
            </select>
            <input type="checkbox" id="sub1B" >Sub?</input>
            <select class="ui-corner-all subs" id="sub_B_team_1" hidden>
            <option></option>
            </select>
            <br>
            <br>
        </td> 
    </tr>
    <tr>
        <td>
            <table border="1">
            <tr>
            <td>Hole 1:</td>
            <td>Hole 2:</td>
            <td>Hole 3:</td>
            <td>Hole 4:</td>
            <td>Hole 5:</td>
            <td>Hole 6:</td>
            <td>Hole 7:</td>
            <td>Hole 8:</td>
            <td>Hole 9:</td>
            <td>Total:</td>
            </tr>
            <tr>
            <td><input type="text" id="score_1_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_2_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_3_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_4_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_5_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_6_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_7_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_8_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_9_1A" style="width:30px" onchange="totalScores('1A')"></input></td>
            <td><input type="text" id="score_total_1A" style="width:30px"></input></td>
            </tr>
            </table>
        </td>
        
        <td>
            <table border="1">
            <tr>
            <td>Hole 1:</td>
            <td>Hole 2:</td>
            <td>Hole 3:</td>
            <td>Hole 4:</td>
            <td>Hole 5:</td>
            <td>Hole 6:</td>
            <td>Hole 7:</td>
            <td>Hole 8:</td>
            <td>Hole 9:</td> 
            <td>Total:</td>
            </tr>
            <tr>
            <td><input type="text" id="score_1_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_2_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_3_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_4_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_5_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_6_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_7_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_8_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_9_1B" style="width:30px" onchange="totalScores('1B')"></input></td>
            <td><input type="text" id="score_total_1B" style="width:30px"></input></td> 
            </tr>
            </table>
        </td>        
    </tr>       
        
     </table>
     
    <label>Team 2</label><br>
    <table border="1">
    <tr>
        <td>      
            <label>Player A:</label><br>
            <select class="ui-corner-all players" id="player_A_team_2">
            <option></option>
            </select>
            <input type="checkbox" id="sub2A" >Sub?</input>
            <select class="ui-corner-all subs" id="sub_A_team_2" hidden>
            <option></option>
            </select>
            <br>
            <br>
        </td>  
        <td>
            <label>Player B:</label><br>
            <select class="ui-corner-all players" id="player_B_team_2">
            <option></option>
            </select>
            <input type="checkbox" id="sub2B" >Sub?</input>
            <select class="ui-corner-all subs" id="sub_B_team_2" hidden>
            <option></option>
            </select>
            <br>
            <br>   
        </td> 
    </tr>
    <tr>
        <td>
            <table border="1">
            <tr>
            <td>Hole 1:</td>
            <td>Hole 2:</td>
            <td>Hole 3:</td>
            <td>Hole 4:</td>
            <td>Hole 5:</td>
            <td>Hole 6:</td>
            <td>Hole 7:</td>
            <td>Hole 8:</td>
            <td>Hole 9:</td>
            <td>Total:</td>    
            </tr>
            <tr>
            <td><input type="text" id="score_1_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_2_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_3_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_4_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_5_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_6_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_7_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_8_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_9_2A" style="width:30px" onchange="totalScores('2A')"></input></td>
            <td><input type="text" id="score_total_2A" style="width:30px"></input></td>  
            </tr>
            </table>
        </td>
        
        <td>
            <table border="1">
            <tr>
            <td>Hole 1:</td>
            <td>Hole 2:</td>
            <td>Hole 3:</td>
            <td>Hole 4:</td>
            <td>Hole 5:</td>
            <td>Hole 6:</td>
            <td>Hole 7:</td>
            <td>Hole 8:</td>
            <td>Hole 9:</td>
            <td>Total:</td>
            </tr>
            <tr>
            <td><input type="text" id="score_1_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_2_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_3_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_4_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_5_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_6_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_7_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_8_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_9_2B" style="width:30px" onchange="totalScores('2B')"></input></td>
            <td><input type="text" id="score_total_2B" style="width:30px"></input></td>    
            </tr>
            </table>
        </td>        
    </tr>       
        
     </table>
    <br>   
    <button id="submitButton">Submit</button>
    </div>
    
    </div>

</body>
</html>




