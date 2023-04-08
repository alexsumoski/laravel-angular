import { Component } from '@angular/core';
import { User } from 'src/app/interfaces/user';
import { AuthService } from 'src/app/services/auth.service';
import { Auth } from '../../classes/auth';

@Component({
  selector: 'app-navigation',
  templateUrl: './navigation.component.html',
  styleUrls: ['./navigation.component.scss']
})
export class NavigationComponent {
  user: User;

  constructor(private authService: AuthService) {
  }

  ngOnInit(): void {
    Auth.userEmitter.subscribe(user => this.user = user);
  }

  logout(): void {
    // this.authService.logout().subscribe(() => {
    //   console.log('success');
    // });
  }
}
