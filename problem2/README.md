# Problem 2

Will be appreciated if this problem is done in PHP OOPS way. 
You are given two strings S1 and S2, a character C (which can be either Y or N), and an integer I. A Hack Number is defined as follows: 
● It is the first occurrence (the index of the first character) of the string S2 in the string S1 starting from the initial position I or later in S1, depending on the value of C. 
● If C is Y, then the matched S2 must have a space to the left of it in S1 or should be at the start of S1. It must have a space to the right of it in S1 or should be at the end of S1. 
● If C is N, then there is no such compulsion and it can also be inside a word of S1. 
● If no element in S1 matches any element in S2, print “No worries”. Input format (These will be form fields, can use jQuery or javascript also to make it dynamic if required) 
● First line: T (number of test cases) For each test case 
● First line: S1 
● Second line: S2 
● Third line: C 
● Fourth line: I Output format Print the hack number for each test case. If no valid number exists, print “No Worries”. Note All indexes are 0-based, including 'I' and the answer value of 'Hack Number'. 
Sample Input: 
3 We love to code on coderarenaa code Y 0 
We love to code on coderarenaa code Y 14 We love to code on coderarenaa code N 14 Sample Output: 
11 No Worries 19 Explanation: 
Test Case 1: The starting index of "code" in S1 starting from position I or later, that is 0, as a whole word (since C is 'Y') = 11. Test Case 2: There is no "code" in S1 starting from position I or later, that is 14, as a whole word (since C='Y'). Test Case 3: The starting index of "code" in S1 starting from position I or later, that is 14, not necessarily as a whole word (since C is 'N') = 19. 
Constraints 1 ≤ T ≤ 100 1 ≤ |S1| ≤ 50, containing letters('a'-'z', 'A'-'Z') and spaces. 1 ≤ |S2| ≤ 50, containing only letters('a'-'z', 'A'-'Z'). C will either be 'Y' or 'N' I will be between 0 and L-1, L=length of S1. 
