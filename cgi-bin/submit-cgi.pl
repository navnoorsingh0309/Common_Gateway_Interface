#!"C:\xampp\perl\bin\perl.exe"

use strict;
use warnings;
use CGI ':standard';
use Time::Piece;

my $fname = param('fname');
my $lname = param('lname');
my $college = param('college');
my $field = param('field');
my $year = param('year');
my $pic = param('photo');
my $fieldReview;
if (lc($field) eq "computer science") 
{ 
    $fieldReview="this tutorial can also be helpful for your acads";
} else { 
    $fieldReview="this torial will not be much helpful for your acads but it will help you to develop your overall skills.";
}

my $yearReview;
if(($year - Time::Piece->new()->year) lt 2) {
    $yearReview = "You Don't have much time left for completion of your degree. So, you should hurry now!!";
}
elsif(($year - Time::Piece->new()->year) eq 2) {
    $yearReview = "You have sufficient time to master Perl till completion of your degree!!";
}
elsif(($year - Time::Piece->new()->year) gt 2) {
    $yearReview = "You have more than enough time to master Perl till completion of your degree!!";
}

print header,
start_html(-title=>"Perl Tutorial"),
h1("Hello, $fname<br><br>"),
img({ src=>"/uploads/$pic"}),
h2("Welcome to Perl Tutorial Website<br>"),
h3("As you are student of $field at $college, $fieldReview."),
h3("As you are going to pass out in $year. $yearReview"),
end_html;
