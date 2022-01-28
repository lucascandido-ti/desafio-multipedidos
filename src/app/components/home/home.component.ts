import { Component, OnInit, ViewChild } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { MatTable } from '@angular/material/table';
import { ModalComponent } from 'src/app/elements/modal/modal.component';
import { UserElement } from 'src/app/model/UserElement';
import { UserElementService } from 'src/app/services/userElement.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [UserElementService]
})

export class HomeComponent implements OnInit {
  
  //Columns for table
  displayedColumns: string[] = ['id', 'email', 'password', 'actions'];

  //Variable to save user data
  dataSource!: UserElement[];

  constructor(
    public dialog: MatDialog,
    public userElementService: UserElementService
  ) {

    //List all users
    this.listUsers()
  }

  ngOnInit(): void {
  }

  //Function to list all users
  listUsers():void{
    this.userElementService.getUsers()
      .subscribe((data:UserElement[])=>{
        this.dataSource = data;
      });
  }

  //Function to open modal
  openModal(element: UserElement | null): void {
      const dialogRef = this.dialog.open(ModalComponent, {
        width: '250px',
        data: element === null ?  {
                                    id: null,
                                    email: "",
                                    password:null
                                  } : {
                                    id: element.id,
                                    email: element.email,
                                    password:element.password,
                                  }
      });
  
      dialogRef.afterClosed().subscribe(result => {
        if(result !== undefined){
          if(this.dataSource.map(p=>p.id).includes(result.id)){
            //Condition when editing user
            this.userElementService.editUsers(result)
              .subscribe((data: UserElement)=>{
                  this.listUsers();
              })
          }else{
            //Condition when creating user
            this.userElementService.createUsers(result)
              .subscribe((data: UserElement)=>{
                this.listUsers();
              })
          }
        }
      });
  }

  //Function to editing user
  editUser(element: UserElement):void{
    this.openModal(element);
  }

  //Function to delete user
  deleteUser(id: Number):void{
    this.userElementService.deleteUsers(id)
      .subscribe(()=>{
        this.listUsers();
      })
  }

}
