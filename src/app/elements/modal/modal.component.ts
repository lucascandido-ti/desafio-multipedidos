import { Component, Inject, OnInit } from '@angular/core';
import {MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { UserElement } from 'src/app/model/UserElement';

@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html',
  styleUrls: ['./modal.component.scss']
})
export class ModalComponent implements OnInit {

  isChange!:boolean;

  constructor(
    @Inject(MAT_DIALOG_DATA)
    public data: UserElement,
    public dialogRef: MatDialogRef<ModalComponent>,
  ) {}


  ngOnInit(): void {
    //Change the modal title type
    if(this.data.id != null){
      this.isChange = true;
    }else{
      this.isChange = false;
    }
  }

  onCancel(): void {
    this.dialogRef.close();
  }

}
