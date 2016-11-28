
<div ng-controller="step2" class="mdl-grid"><div class="mdl-cell mdl-cell--12-col mdl-card  mdl-shadow--2dp" style="padding:15px;min-height:600px">
    
<label>Search: <input ng-model="searchText"></label>
<hr/>

<table id="searchObjResults" class="mdl-data-table" style="width:100%;word-break:break-all;" cellspacing="0">
        <thead>
            <tr>
                <th>Patient Id</th>
                <th>Name</th>
                <th>Gender</th>
				<th>Age</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tfoot>
              <tr  ng-repeat="friendObj in friends | filter:searchText | filter:search:strict">
    <td ><button class="mdl-button mdl-js-button" ng-click="show($index)">{{friendObj.id}}</button></td>
    <td>{{friendObj.fname}} {{friendObj.lname}}</td>
    <td>{{friendObj.gender}}</td><td>{{ friendObj.dob | ageFilter }}</td>
	<td>{{friendObj.contact}}<br/>{{friendObj.contact}}</td>

  </tr>
        </tbody>
    </table>
	</div>
	
	</div>
