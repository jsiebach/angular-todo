class EditableFieldController {

  constructor () {
    this.editMode = false
  }

  handleModeChange() {
    if (this.editMode) {
      this.onUpdate({value: this.fieldValue});
      this.fieldValueCopy = this.fieldValue;
    }
    this.editMode = !this.editMode;
  }

  reset() {
    this.fieldValue = this.fieldValueCopy;
  };

  $onInit() {
    // Make a copy of the initial value to be able to reset it later
    this.fieldValueCopy = this.fieldValue;

    // Set a default fieldType
    if (!this.fieldType) {
      this.fieldType = 'text';
    }
  };
}

export default {
  template: `
  <span ng-switch="$ctrl.editMode">
    <input ng-switch-when="true" type="{{$ctrl.fieldType}}" ng-model="$ctrl.fieldValue">
    <span ng-switch-default>{{$ctrl.fieldValue}}</span>
  </span>
  <button ng-click="$ctrl.handleModeChange()">{{$ctrl.editMode ? 'Save' : 'Edit'}}</button>
  <button ng-if="$ctrl.editMode" ng-click="$ctrl.reset()">Reset</button>
  `,
  controller: EditableFieldController,
  bindings: {
    fieldValue: '<',
    fieldType: '@?',
    onUpdate: '&'
  }
}