# Problem 1

Will be appreciated if this problem is done in PHP OOPS way. 
There are N words in a dictionary such that each word has a length M and consists only of lowercase English letters, i.e. ('a', 'b' ... 'z'). There are Q queries in which you are given a query word of length M with some unspecified letters represented by the symbol '?' . Write a program to count the number of words in the dictionary which have the same letters in all the specified positions. Input format (These will be form fields, can use jQuery or javascript also to make it dynamic if required) 
● First line: Two space separated integers N and M 
● Next N lines: One word 
● Next line: Q 
● Next Q lines: Query word Output format For each query, print the number of words in the dictionary which have the same letters in all the specified positions. 
Sample Input: 
5 3 cat map bat man pen 4 ?at ma? ?a? ??n 
Sample Output: 
2 2 4 2 Explanation: 
In the 1-st query only words with 'a' on the 2-nd position and with 't' on the 3-rd should be counted. The 1-st letter can be any. We have 2 such words in vocabulary: cat, bat. 
In the 2-nd query only words with 'm' on the 1-st position and with 'a' on the 2-nd should be counted. The 3-rd letter can be any. We have 2 such words in vocabulary: map, man. 
In the 3-rd query only words with 'a' on the 2-nd position should be counted. The 1-st and the 3- rd letters can be any. We have 4 such words in vocabulary: cat, map, bat, man. 
In the 4-th query only words with 'n' on the 3-rd position should be counted. The 1-st and the 2- nd letters can be any. We have 2 such words in vocabulary: man, pen. 
