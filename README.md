# RateMyClass (www.ratemyclass.org)
RateMyClass is an open source project created at Drexel University that allow students to view score distribution and difficulty of a class through data crowdsourced by Drexel students. It is written in PHP to allow users to create account, and uses SQL database to compute class average, score distribution, sample size and class's difficulty level (easy, medium, hard). The webapp also utilizes JavaScript sorting algorithm to sort classes from easiest to hardest for each major, and displays it to the client side using chartJS framework. All functionalities are automated by making AJAX call to the server and commit new changes through JSON file, allowing data update within 1 second.   

## How To Use
### 1. Register an account.
Account must be registered with a Drexel University's email address. This is for verification purpose so that grade are only inputted from Drexel students, and not from outsiders. Attempt to register with a non-Drexel University email will result in failure.
### 2. Create an anonymous username and password.
If you forgot your credentials, click "Forgot My Password" and an email will be send to your Drexel University's email address containing your username and password.
### 3. Input at least 3 grades
You will be redirected to the dashboard. To use the search function, input at least 3 grades (e.g A, B, B+) for 3 classes of which you have taken (e.g CS171, CS172, CS164).
### 4. Functionalities:
  - <b> Dashboard </b> is where you can see the grade distribution across all colleges within the University (e.g College of Arts and Science, College of Computing and Informatics...etc.). Live update is a feature on dashboard where you can see recently added scores. 
  - <b> Search bar </b> is where you can find a class's name. Click on the datalist option to redirect to the class's page. You will be able to see how many people have taken this class, how many receive A, B, C...etc., as well as class score. If you cannot find a class's name when search, let us know through the contact form on the Settings page. Certain classes such as Independent Study or Special Topics are not yet entered into our database. At the moment, Ratemyclass only contained classes with high volume of students.
  - <b> Sorting </b> is where you can choose a major's name (e.g Computer Science) and a sorting order (Easiest->Hardest or Hardest->Easiest). You will be redirected to a page that listed the classes out in your sorting order.
  - <b> Input </b> is where you can enter grade for classes you have taken. If you want to input multiple class, keep clicking +. jQuery will dynamically create multiple forms for input and send them to PHP.
  - <b> Settings </b> is where you can change your password, as well as communicating with us if you have any issue using the website through the contact form.
  - <b> Logout </b> will safely destroy your login session. If you do not click log out, next time you browse, the website will automatically log you onto the dashboard if you don't clear your cache. We do not recommend this if you are using a public computer.


### 5. Reviewing
In addition to viewing a class's difficulty, Ratemyclass also contains a built in commenting system where you can submit anonymous review for a class. Since quantitative data alone will not always sufficiently communciate the whole picture, feel free to give your subjective opinion on a class's difficulty.  

## How It Works
- <b> The class ranking is built on the following formula: </b> if class average > 3.30, it is easy. If class average > 2.60, it is medium. Below that is hard. This is graded on a 4.0 scale with 4 = A, 3 = B, 2 = C, 1 = D, and 0 = F. For more information, check out Drexel University's official [GPA calculation.](http://drexel.edu/drexelcentral/transcripts/grades/gpa-calculation/)
- <b> People cannot see your score </b>: The only thing that others user can see is a class average and how many people have submit grade from a class. See [Sample Page](https://www.ratemyclass.org/terms/samplepage.html). We cannot see your grade either, only the classes you have entered. 
- <b> You can only submit your grade once, </b> so make sure you enter the correct grade. This functionality is implemented in PHP to prevent user from submitting multiple grade for the same class, which could lead to skewing the grade data.
- <b> You can only sign up once </b>: This is to prevent one Drexel student from creating multiple account and skew the grade distribution. If you have not signed up but the system said someone already signed up with your email, either <b>a) </b> you forgot your username and password, then go [here](https://www.ratemyclass.org/phpfile/forgot.php) or <b>b)</b> someone sign up with your account. If the case is the latter, contact us immediately.
- <b>Disclaimer</b>: since the classifier (easy, medium, and hard) is based on a formula, it is NOT the ultimate one-fit-all answer on whether a class is easy or hard for you. Class's difficulty also depend on other factor such as your enjoyment of the class and your skills (e.g a programming class might be easy for a computer science major but not for an arts student and vice versa). So don't blame me if a class turn out to be hard for you even though it says easy on our website, because the demographics of students who are taking that class might be different :)

## Other Important Information
- As this involves data sharing of user scores, Ratemyclass has a <b> Privacy Policy </b>. Check the website for more information.
- If you have any suggestions, find a bug, or just want to comment, feel free to contact me through the contact form on the settings page or shoot me an email at mnl98x@gmail.com.
- This project is my first, so it isn't built with any framework since I wrote all my PHP & JavaScript code from scratch. Therefore, there are still some minor bugs in term of user interface and data performance. <b> Please DO NOT open the website on your mobile phone. </b> This website is not configured for mobile, sorry :)


## Contributing
1. Pull/Fork
2. Issue Pull Request
3. Make Issues

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct, and the process for submitting pull requests to me.

## License and Copyright
@Minh Le, Drexel University. This project is licensed under the [GNU LGPLv3](LICENSE) License.
