---
name: Bug report
about: Create a report to help us improve
title: Bug
labels: bug
assignees: VPavlov16

---

**Describe the bug**
2 Users can control the same vehicle at the same time

**To Reproduce**
Steps to reproduce the behavior:
=========
User 1
1. Go to 'Vehicles'
2. Click on the wanted vehicle
3. Click "Control"
4.Start controlling it
=========
User 2
1.Go to the control page
2.Select any vehicle
3.Change the href from "$id=(vehicle's id)" to any other id that is being used "$id=3"
4.See the error,now 2 people control the same vehicle
=========
**Expected behavior**
An error message was expected to show,that the vehicle is already in use by somebody

**Desktop:**
 - OS: Windows 11 Pro
 - Browser: Chrome
 - Version: 121

**Smartphone:**
 - Device: Xiaomi Mi 11
 - OS: Android 13
 - Browser:  Chrome
 - Version: 120

**Other info**
Severity:	High
Priority:	Medium
Reported by:	tester
Reported on:	14-02-2024
Status:	New
